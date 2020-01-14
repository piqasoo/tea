<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Video extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'text', 'slug'];
    protected $fillable = ['date', 'image', 'video', 'active'];

    public function video_translations(){
    	return $this->hasMany(VideoTranslation::class);
    }
}
