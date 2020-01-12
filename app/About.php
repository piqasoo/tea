<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class About extends Eloquent implements TranslatableContract
{
    use Translatable;

     /**
     * Array with the fields translated in the Translation table.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'text', 'description', 'keywords'];
    protected $fillable = ['image'];

    public function about_translations(){
    	return $this->hasMany(AboutTranslation::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
