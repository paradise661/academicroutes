<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IeltsRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'number', 'location', 'program_enrollment', 
        'program_other', 'class_type', 'deposit_made', 'deposit_amount', 'preferred_joining_date', 
        'preferred_timing', 'timing_other', 'university_applied', 'university_name', 'university_other', 
        'country_interest', 'consultancy', 'reference'
    ];
}