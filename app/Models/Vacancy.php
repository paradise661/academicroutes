<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//this is for contact us page
class Vacancy extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'email', 'number', 'link', 'file', 'message'];
}
