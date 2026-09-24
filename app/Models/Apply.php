<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "status",
        "slug",
        'name',
        'email',
        'number',
        'course',
        'country',
        'university',
        'address',
        'intake',
        'academic_qualification',
        'academic_score',
        'english_score',
        'passed_year',
        'master_certificate',
        'bachelor_certificate',
        'diploma',
        'cv',
        'grade_twelve',
        'other',
        'passport',
        'ielts',

    ];

    // Automatically generate a slug when a new agency is created or updated
    protected static function booted()
    {
        static::saving(function ($apply) {
            if (empty($apply->slug) && !empty($apply->name)) {
                // Generate the slug based on company_name
                $apply->slug = Str::slug($apply->company_name);

                // Ensure the slug is unique (optional)
                $existingSlugCount = Apply::where('slug', $apply->slug)->count();
                if ($existingSlugCount > 0) {
                    $apply->slug .= '-' . ($existingSlugCount + 1);
                }
            }
        });
    }
}
