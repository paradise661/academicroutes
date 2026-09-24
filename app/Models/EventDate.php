<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    protected $fillable = ['event_id', 'date', 'time', 'location'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
