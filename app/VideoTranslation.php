<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTranslation extends Model
{
     public $timestamps = false;

    protected $fillable = ['title', 'text', 'date', 'image', 'video', 'active', 'slug']; 
}
