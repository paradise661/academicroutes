<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image','image_2', 'banner', 'template', 'description','description_2', 'others', 'seo_title', 'seo_description', 'seo_keywords', 'seo_schema', 'status'];
}