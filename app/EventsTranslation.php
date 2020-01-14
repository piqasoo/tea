<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['place','name', 'role', 'text', 'date', 'time', 'address_link', 'ticket', 'slug'];   
}
