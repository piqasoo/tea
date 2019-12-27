<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Review extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name','title', 'text'];

    public function review_translations(){
    	return $this->hasMany(ReviewTranslation::class);
    }
}
