<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//this is for contact us page
class Appointment extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'email', 'number',  'country', 'address', 'message'];

}

