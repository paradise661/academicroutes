<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'banner',
        'order',
        'status',
        'description',
        'short_description',
        'parent_id',

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema'
    ];

    public function blogs()
    {
        return $this->belongsToMany(News::class, 'category_blogs', 'category_id', 'blog_id');
    }

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }
}