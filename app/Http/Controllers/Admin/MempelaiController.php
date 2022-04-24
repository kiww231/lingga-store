<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Mempelai;

class MempelaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Mempelai::all();
        return view('admin.mempelai.list',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mempelai.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        // dd($request->all());
        DB::beginTransaction();

        $url = strtolower($request->panggilan_pria . $request->panggilan_wanita);
        $nama_foto_pria = '';
        if($request->foto_pria){
            $extension = $request->file('foto_pria')->getClientOriginalExtension();
            $nama_foto_pria = time() . $request->panggilan_pria . '.' . $extension;
            $path = $request->file('foto_pria')->move(public_path('uploads/mempelai'),$nama_foto_pria);
        }

        $nama_foto_wanita = '';
        if($request->foto_wanita){
            $extension = $request->file('foto_wanita')->getClientOriginalExtension();
            $nama_foto_wanita = time() . $request->panggilan_wanita . '.' . $extension;
            $path = $request->file('foto_wanita')->move(public_path('uploads/mempelai'),$nama_foto_wanita);
        }
        
        $input['url']                   = $url;
        $input["panggilan_pria"]        = $request->panggilan_pria;
        $input["nama_lengkap_pria"]     = $request->nama_lengkap_pria;
        $input["panggilan_wanita"]      = $request->panggilan_wanita;
        $input["nama_lengkap_wanita"]   = $request->nama_lengkap_wanita;
        $input["ibu_pria"]              = $request->ibu_pria;
        $input["ayah_pria"]             = $request->ayah_pria;
        $input["ibu_wanita"]            = $request->ibu_wanita;
        $input["ayah_wanita"]           = $request->ayah_wanita;
        $input["alamat"]                = $request->alamat;
        $input["ig_pria"]               = $request->ig_pria;
        $input["ig_wanita"]             = $request->ig_wanita;
        $input["hari_akad"]             = $request->hari_akad;
        $input["tgl_akad"]              = date('Y-m-d', strtotime($request->tgl_akad));
        $input["waktu_mulai_akad"]      = date('H:i:s', strtotime($request->waktu_mulai_akad));
        $input["waktu_selesai_akad"]    = date('H:i:s', strtotime($request->waktu_selesai_akad));
        $input["hari_resepsi"]          = $request->hari_resepsi;
        $input["tgl_resepsi"]           = $request->tgl_resepsi ? date('Y-m-d', strtotime($request->tgl_resepsi)) : null;
        $input["waktu_mulai_resepsi"]   = $request->waktu_mulai_resepsi ? date('H:i:s', strtotime($request->waktu_mulai_resepsi)) : null;
        $input["waktu_selesai_resepsi"] = $request->waktu_selesai_resepsi ? date('H:i:s', strtotime($request->waktu_selesai_resepsi)) : null;
        $input["map"]                   = $request->map; 
        $input["nama_bank"]             = $request->nama_bank;
        $input["rekening"]              = $request->rekening;
        $input["nama_e_walet"]          = $request->nama_e_walet;
        $input["e_walet"]               = $request->e_walet;
        $input['foto_pria']             = $nama_foto_pria;
        $input['foto_wanita']           = $nama_foto_wanita;

        $status = Mempelai::create($input);

        DB::commit();

        if($status){
            return redirect('admin/mempelai')->with('success','Data Mempelai Berhasil disimpan!');
        }else{
            return redirect('admin/mempelai')->with('error','Data Mempelai Gagal disimpan!');
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
        return view('admin.mempelai.form',$data);
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
        // dd($request->all());
        $data = Mempelai::find($id);
        $url = strtolower($request->panggilan_pria . $request->panggilan_wanita);

        $nama_foto_pria = $data->foto_pria;
        if($request->foto_pria){
            $extension = $request->file('foto_pria')->getClientOriginalExtension();
            $request->file('foto_pria')->move(public_path('uploads/mempelai'),$nama_foto_pria);
        }

        $nama_foto_wanita = $data->foto_wanita;
        if($request->foto_wanita){
            $extension = $request->file('foto_wanita')->getClientOriginalExtension();
            $request->file('foto_wanita')->move(public_path('uploads/mempelai'),$nama_foto_wanita);
        }
        
        
        $data['url']                   = $url;
        $data["panggilan_pria"]        = $request->panggilan_pria;
        $data["nama_lengkap_pria"]     = $request->nama_lengkap_pria;
        $data["panggilan_wanita"]      = $request->panggilan_wanita;
        $data["nama_lengkap_wanita"]   = $request->nama_lengkap_wanita;
        $data["ibu_pria"]              = $request->ibu_pria;
        $data["ayah_pria"]             = $request->ayah_pria;
        $data["ibu_wanita"]            = $request->ibu_wanita;
        $data["ayah_wanita"]           = $request->ayah_wanita;
        $data["alamat"]                = $request->alamat;
        $data["ig_pria"]               = $request->ig_pria;
        $data["ig_wanita"]             = $request->ig_wanita;
        $data["hari_akad"]             = $request->hari_akad;
        $data["tgl_akad"]              = date('Y-m-d', strtotime($request->tgl_akad));
        $data["waktu_mulai_akad"]      = date('H:i:s', strtotime($request->waktu_mulai_akad));
        $data["waktu_selesai_akad"]    = date('H:i:s', strtotime($request->waktu_selesai_akad));
        $data["hari_resepsi"]          = $request->hari_resepsi;
        $data["tgl_resepsi"]           = $request->tgl_resepsi ? date('Y-m-d', strtotime($request->tgl_resepsi)) : null;
        $data["waktu_mulai_resepsi"]   = $request->waktu_mulai_resepsi ? date('H:i:s', strtotime($request->waktu_mulai_resepsi)) : null;
        $data["waktu_selesai_resepsi"] = $request->waktu_selesai_resepsi ? date('H:i:s', strtotime($request->waktu_selesai_resepsi)) : null;
        $data["map"]                   = $request->map; 
        $data["nama_bank"]             = $request->nama_bank;
        $data["rekening"]              = $request->rekening;
        $data["nama_e_wallet"]         = $request->nama_e_wallet;
        $data["e_wallet"]              = $request->e_wallet;
        $data['foto_pria']             = $nama_foto_pria;
        $data['foto_wanita']           = $nama_foto_wanita;

        $status = $data->save();

        DB::commit();

        if($status){
            return redirect('admin/mempelai')->with('success','Data Mempelai Berhasil diubah!');
        }else{
            return redirect('admin/mempelai')->with('error','Data Mempelai Gagal diubah!');
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
        DB::beginTransaction();
        $data = Mempelai::find($id);
        File::delete(public_path("uploads/mempelai/" . $data->foto_pria));
        File::delete(public_path("uploads/mempelai/" . $data->foto_wanita));
        $status = $data->delete();
        DB::commit();
        $notif  = 'success';
        
        return response()->json($notif);
    }

    public function status($id,$status)
    {
        $data = Mempelai::find($id);
        $data->status = $status;
        $status = $data->save();
        $notif = 'success';

        return response()->json($notif);
    }
}
