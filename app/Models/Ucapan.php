<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    protected $table = "ucapan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mempelai',
        'nama',
        'pesan',
        'created_at',
        'updated_at',
    ];
    

}
