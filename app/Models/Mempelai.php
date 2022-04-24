<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mempelai extends Model
{
    protected $table = "mempelai";
    protected $primaryKey = 'id';
    protected $fillable = [
      'url',
      'panggilan_pria',
      'nama_lengkap_pria',
      'panggilan_wanita',
      'nama_lengkap_wanita',
      'ibu_pria',
      'ayah_pria',
      'ibu_wanita',
      'ayah_wanita',
      'hari_akad',
      'tgl_akad',
      'waktu_mulai_akad',
      'waktu_selesai_akad',
      'hari_resepsi',
      'tgl_resepsi',
      'waktu_mulai_resepsi',
      'waktu_selesai_resepsi',
      'ig_pria',
      'ig_wanita',
      'alamat',
      'map',
      'nama_bank',
      'rekening',
      'nama_e_wallet',
      'e_wallet',
      'foto_pria',
      'foto_wanita',
      'status',
      'created_at',
      'updated_at',
    ];

}
