<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'image', 'type', 'level', 'salary', 'experiance', 'location', 'deadline', 'number', 'status', 'order'];
}
