<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    
    protected $table = 'services'; 
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
