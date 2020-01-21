<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class PhotoAlbum extends Eloquent implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'text', 'slug'];
    protected $fillable = ['date', 'image', 'active'];

    public function photo_album_translations(){
    	return $this->hasMany(PhotoAlbumTranslation::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
