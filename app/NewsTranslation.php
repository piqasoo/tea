<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title_01','title_02', 'text', 'date', 'image', 'images', 'slug']; 
}
