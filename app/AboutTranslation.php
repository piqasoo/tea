<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'about_id',
        'locale',
        'title',
        'text',
        'description', 
        'keywords',
    ];
}
