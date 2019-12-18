<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contact extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['manager','description', 'keywords'];
    protected $fillable = ['mail_01', 'mail_02', 'facebook', 'instagram', 'twitter', 'youtube'];

    public function contact_translations(){
    	return $this->hasMany(ContactTranslation::class);
    }
}
