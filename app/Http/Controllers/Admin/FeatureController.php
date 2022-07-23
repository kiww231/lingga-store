<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Feature::all();
        return view('admin.feature.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.form');
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
            'title' => 'required|unique:feature',
            'icon' => 'required',
        ]);

        $data = $request->all();
        $data['status'] = 1;
        $status = Feature::create($data);

        if($status){
            return redirect('admin/feature')->with('success','Data Feature Berhasil ditambahkan!');
        }else{
            return redirect('admin/feature')->with('error','Data Feature Gagal ditambahkan!');
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
        $data['result'] = Feature::find($id);
        return view('admin.feature.form', $data);
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
            'title' => 'required|unique:feature,id,'.$id,
            'icon' => 'required',
        ]);

        $data = Feature::find($id);

        $input = $request->all();
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/feature')->with('success','Data Feature Berhasil diubah!');
        }else{
            return redirect('admin/feature')->with('error','Data Feature Gagal diubah!');
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
        $data = Feature::find($id);
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function change_status($id, $status)
    {
        $data = Feature::find($id);
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
