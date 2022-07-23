<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Str;
use File;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Article::leftJoin('category','category.id','=','article.category')
            ->select('article.*','category.title as category')->get();
        return view('admin.article.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('admin.article.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:article',
            'summary'   => 'required',
            'content'   => 'required',
            'category'  => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $image_name = time() . '-image.' . $request->file('image')->extension();
        $request->file('image')->move(storage_path('app/public/uploads/article'), $image_name);
        
        $thumbnail_name = time() . '-thumbnail.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->move(storage_path('app/public/uploads/article'), $thumbnail_name);

        $data = $request->all();
        $data['slug']       = Str::slug($request->title);
        $data['status']     = 1;
        $data['view']       = 0;
        $data['image']      = $image_name;
        $data['thumbnail']  = $thumbnail_name;
        $status = Article::create($data);

        if($status){
            return redirect('admin/article')->with('success','Data Article Berhasil ditambahkan!');
        }else{
            return redirect('admin/article')->with('error','Data Article Gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['result'] = Article::find($id);
        $data['category'] = Category::all();
        return view('admin.article.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|unique:article,id,'.$id,
            'summary'   => 'required',
            'content'   => 'required',
            'category'  => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $result = Article::find($id);
        $image_name     = $result->image;
        $thumbnail_name = $result->thumbnail;
        if($request->image){
            if(File::exists(public_path('storage/blog/'.$result->image))){
                File::delete(public_path('storage/blog/'.$result->image));
            }
            $image_name = time() . '-image.' . $request->file('image')->extension();
            $request->file('image')->move(storage_path('app/public/uploads/article'), $image_name);
        }
        
        if($request->thumbnail){
            if(File::exists(public_path('storage/blog/'.$result->thumbnail))){
                File::delete(public_path('storage/blog/'.$result->thumbnail));
            }
            $thumbnail_name = time() . '-thumbnail.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(storage_path('app/public/uploads/article'), $thumbnail_name);
        }

        $data = $request->all();
        $data['slug']       = Str::slug($request->title);
        $data['image']      = $image_name;
        $data['thumbnail']  = $thumbnail_name;
        $status = $result->fill($data)->save();

        if($status){
            return redirect('admin/article')->with('success','Data Article Berhasil diubah!');
        }else{
            return redirect('admin/article')->with('error','Data Article Gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_status($id, $status)
    {
        $data = Article::find($id);
        if($status == 1){
            $data->status = 1;
        }else{
            $data->status = 0;
        }

        $status = $data->save();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
