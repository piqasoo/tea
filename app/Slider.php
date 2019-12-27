<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Slider extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title_01', 'title_02'];
    protected $fillable = ['image', 'link'];

    public function slider_translations(){
    	return $this->hasMany(SliderTranslation::class);
    }
}
