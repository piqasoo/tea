<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Events extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['place','name', 'role', 'text'];
    protected $fillable = ['date', 'time', 'address_link', 'ticket'];

    public function event_translations(){
    	return $this->hasMany(EventsTranslation::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
