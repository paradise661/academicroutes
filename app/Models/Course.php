<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'description',
        'image',
        'duration',
        'price',
        'status',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'seo_schema',
        'order',
    ];
    protected static function booted()
    {
        static::creating(function ($course) {
            // Generate an initial slug from the title
            $slug = Str::slug($course->title, '-');
            $originalSlug = $slug;

            // Check if the slug already exists in the database
            $count = 1;
            while (self::where('slug', $slug)->exists()) {
                // Append a number to the slug for uniqueness
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $course->slug = $slug;
        });
    }
}
