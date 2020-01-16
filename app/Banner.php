<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Banner extends Eloquent implements TranslatableContract
{
    use Translatable;

     /**
     * Array with the fields translated in the Translation table.
     *
     * @var array
     */
    public $translatedAttributes = ['title_01', 'title_02'];
    protected $fillable = ['page','image', 'active'];

    public function banner_translations(){
    	return $this->hasMany(BannerTranslation::class);
    }
}
