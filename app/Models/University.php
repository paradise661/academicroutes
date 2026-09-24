<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'order', 'slug', 'status', 'image', 'banner_image', 'link', 'abroad_id'];

    public function abroad()
    {
        return $this->belongsTo(Abroad::class, 'abroad_id');
    }
}
