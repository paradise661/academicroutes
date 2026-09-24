<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'extention', 'fullurl', 'alt', 'date', 'width', 'height', 'size'];
}
