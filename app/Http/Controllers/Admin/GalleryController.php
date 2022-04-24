<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Mempelai;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mempelai = Mempelai::find($request->id_mempelai);
        $gallery = '';
        if($request->file){
            $extension = $request->file('file')->getClientOriginalExtension();
            $gallery = time() . strtolower($request->panggilan_pria . $request->panggilan_wanita) . '.' . $extension;
            $path = $request->file('file')->move(public_path('uploads/gallery'),$gallery);
        }

        $input['id_mempelai'] = $request->id_mempelai;
        $input['image']       = $gallery;
        $status = Gallery::create($input);
        if ($status) {
            $notif = 'success';
        }else{
            $notif = 'error';
        }
        return response()->json($notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Gallery::where('id_mempelai',$id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['result'] = Mempelai::find($id);
        $data['gallery'] = Gallery::where('id_mempelai',$id)->orderBy('id','desc')->get();
        return view('admin.gallery.form',$data);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $data = Gallery::find($id);
        File::delete(public_path("uploads/gallery/" . $data->image));
        $status = $data->delete();
        DB::commit();
        $notif  = 'success';
        
        return response()->json($notif);
    }
}
