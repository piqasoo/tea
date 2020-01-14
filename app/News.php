<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title_01','title_02', 'text'];
    protected $fillable = ['date', 'image', 'images'];

    public function news_translations(){
    	return $this->hasMany(NewsTranslation::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
