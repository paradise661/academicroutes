<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon',
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

    public function company()
    {
        return $this->hasMany(Company::class, 'category');
    }
}
