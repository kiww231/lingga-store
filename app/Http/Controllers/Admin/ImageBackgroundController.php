<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\ImageBackground;
use App\Models\Mempelai;

class ImageBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.image_background.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $header = '';
        if($request->header){
            $extension = $request->file('header')->getClientOriginalExtension();
            $header = time() . 'header_' . strtolower($request->panggilan_pria . $request->panggilan_wanita) . '.' . $extension;
            $path = $request->file('header')->move(public_path('uploads/image_background'),$header);
        }

        $event = '';
        if($request->event){
            $extension = $request->file('event')->getClientOriginalExtension();
            $event = time() . 'event_' . strtolower($request->panggilan_pria . $request->panggilan_wanita) . '.' . $extension;
            $path = $request->file('event')->move(public_path('uploads/image_background'),$event);
        }

        $attending = '';
        if($request->attending){
            $extension = $request->file('attending')->getClientOriginalExtension();
            $attending = time() . 'attending_' . strtolower($request->panggilan_pria . $request->panggilan_wanita) . '.' . $extension;
            $path = $request->file('attending')->move(public_path('uploads/image_background'),$attending);
        }

        $input['id_mempelai']   = $request->id_mempelai;
        $input['header']        = $header;
        $input['event']         = $event;
        $input['attending']     = $attending;
        $status = ImageBackground::create($input);

        DB::commit();
        if($status){
            return redirect('admin/mempelai')->with('success','Data Image Background Berhasil disimpan!');
        }else{
            return redirect('admin/mempelai')->with('error','Data Image Background Gagal disimpan!');
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
        $data['mempelai'] = Mempelai::where('id',$id)->first();
        $data['result'] = ImageBackground::where('id_mempelai',$id)->first();
        return view('admin.image_background.form',$data);
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
        DB::beginTransaction();
        $data = ImageBackground::find($id);
        
        $header = $data->header;
        if($request->header){
            $extension = $request->file('header')->getClientOriginalExtension();
            $request->file('header')->move(public_path('uploads/image_background'),$header);
        }

        $event = $data->event;
        if($request->event){
            $extension = $request->file('event')->getClientOriginalExtension();
            $request->file('event')->move(public_path('uploads/image_background'),$event);
        }

        $attending = $data->attending;
        if($request->attending){
            $extension = $request->file('attending')->getClientOriginalExtension();
            $request->file('attending')->move(public_path('uploads/image_background'),$attending);
        }

        $data->header        = $header;
        $data->event         = $event;
        $data->attending     = $attending;
        $status = $data->save();

        DB::commit();
        if($status){
            return redirect('admin/mempelai')->with('success','Data Image Background Berhasil diubah!');
        }else{
            return redirect('admin/mempelai')->with('error','Data Image Background Gagal diubah!');
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
}
