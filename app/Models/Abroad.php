<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Abroad extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'slug', 'status', 'order', 'image', 'icon_image', 'description', 'seo_schema', 'seo_title', 'seo_keywords', 'seo_description'];

    // Automatically generate a slug from the title when a new record is created
    public static function boot()
    {
        parent::boot();

        static::creating(function ($abroad) {
            $abroad->slug = Str::slug($abroad->name, '-');
        });

        static::updating(function ($abroad) {
            $abroad->slug = Str::slug($abroad->name, '-');
        });
    }
    public function universities()
    {
        return $this->hasMany(University::class, 'abroad_id');
    }
    

}
