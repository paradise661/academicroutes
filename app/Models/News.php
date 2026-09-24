<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'description','author','position', 'image','order','status','slug','seo_title','seo_description','seo_keywords','seo_schema'];

    // Cast created_at and updated_at to Carbon instances
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot method to handle model events like saving or creating
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically create a custom slug if not provided
        static::creating(function ($news) {
            $news->generateSlug();
        });

        static::updating(function ($news) {
            if (!$news->slug) {
                $news->generateSlug();
            }
        });
    }

    /**
     * Method to generate a custom slug.
     */
    public function generateSlug()
    {
        if (!$this->slug) {
            // Start with a base slug
            $slugBase = Str::slug($this->title);
            $slug = $slugBase;
            $count = 1;

            // Check for uniqueness
            while (self::where('slug', $slug)->exists()) {
                $slug = "{$slugBase}-" . $count++;
            }

            $this->slug = $slug;
        }
    }
}

