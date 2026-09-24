<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agency extends Model
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
        'company_name',
        'registered_address',
        'phone_number',
        'fax_number',
        'official_email',
        'website',
        'registration_number',
        'pan_number',
        'contact_email',
        'designation',
        'status',
        'dob',
        'mobile',
        'gender',
        'residence_address',
        'contact_name',
    ];

    // Automatically generate a slug when a new agency is created or updated
    protected static function booted()
    {
        static::saving(function ($agency) {
            if (empty($agency->slug) && !empty($agency->company_name)) {
                // Generate the slug based on company_name
                $agency->slug = Str::slug($agency->company_name);

                // Ensure the slug is unique (optional)
                $existingSlugCount = Agency::where('slug', $agency->slug)->count();
                if ($existingSlugCount > 0) {
                    $agency->slug .= '-' . ($existingSlugCount + 1);
                }
            }
        });
    }
}
