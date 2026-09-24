<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'number', 'course', 'country', 'university', 
        'address', 'intake', 'qualification', 'academic_score', 
        'english_score', 'passed_year', 'event'  
    ];
}
