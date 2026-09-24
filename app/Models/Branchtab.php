<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branchtab extends Model
{
    protected $fillable = [
        'name',
        'order',
        'status',
        'image',
        'status',
        'slug',
        'link',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
