<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mempelai;
use App\Models\ImageBackground;
use App\Models\Ucapan;
use App\Models\Gallery;

class WeddingController extends Controller
{
    public function index($url)
    {
        $to = '';
        if($_GET){
            $to = $_GET['to'];
        }
        $data_mempelai = Mempelai::leftJoin('image_background','image_background.id_mempelai','=','mempelai.id')
            ->select('mempelai.*','image_background.*','mempelai.id as id_mempelai')
            ->where('url',$url)
            ->where('status',1)
            ->first();
            
        if($data_mempelai){
            $data['result'] = $data_mempelai;
            $data['ucapan'] = Ucapan::where('id_mempelai',$data_mempelai->id_mempelai)->get();
            $data['gallery'] = Gallery::where('id_mempelai',$data_mempelai->id_mempelai)->get();
            $data['to'] = $to;
            return view('template-001',$data);
        }else{
            return view('errors.mempelai_notfound');
        }
    }
}
