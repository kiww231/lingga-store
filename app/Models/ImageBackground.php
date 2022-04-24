<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBackground extends Model
{
    protected $table = "image_background";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mempelai',
        'header',
        'event',
        'attending',
        'created_at',
        'updated_at',
    ];
    

}
