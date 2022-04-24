<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "gallery";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mempelai',
        'image',
        'created_at',
        'updated_at',
    ];

}
