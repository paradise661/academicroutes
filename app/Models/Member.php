<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'email', 'phone', 'position', 'sociallink', 'sociallink1', 'sociallink2', 'description', 'order', 'status'];
}
