<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    
    protected $table = 'f_a_q_s'; 
    protected $fillable = [
        'name',
        'slug',
        'image',
        'banner',
        'url',
        'category',
        'gallery',
        'date',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
        'order',
        'status',
        'file'
    ];
}
