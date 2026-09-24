<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    protected $fillable = [
        'title',
        'email',
        'phone',
        'tabs',
        'location',
        'branch_name',
        'slug',
        'category',
        'short_description',
        'description',
        'image',
        'status',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'seo_schema',
        'order',
        'name',
        'branchtab_id'
    ];
    protected static function booted()
    {
        static::creating(function ($branch) {
            // Generate an initial slug from the title
            $slug = Str::slug($branch->title, '-');
            $originalSlug = $slug;

            // Check if the slug already exists in the database
            $count = 1;
            while (self::where('slug', $slug)->exists()) {
                // Append a number to the slug for uniqueness
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $branch->slug = $slug;
        });
    }

    public function getTabsAttribute($value)
    {
        return explode(',', $value);
    }

    // Convert array back to a string before saving
    public function setTabsAttribute($value)
    {
        $this->attributes['tabs'] = is_array($value) ? implode(',', $value) : $value;
    }

    // Get associated branchtabs using the IDs stored in 'tabs'
    public function branchtabs()
    {
        return Branchtab::whereIn('id', $this->tabs)->get();
    }
}
