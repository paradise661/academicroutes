<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
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

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category');
    }
}
