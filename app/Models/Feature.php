<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "feature";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'icon',
        'status',
    ];
}
