<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoAlbumTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'text', 'date', 'image', 'active', 'slug', 'top']; 
}
