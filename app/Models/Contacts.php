<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//this is for contact us page
class Contacts extends Model
{

    use HasFactory;
    protected $fillable = ['first_name', 'email', 'number', 'course', 'country', 'message', 'address', 'url','last_name'];
}
