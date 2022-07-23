<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'title',
        'summary',
        'content',
        'category',
        'view',
        'slug',
        'status',
        'thumbnail',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
