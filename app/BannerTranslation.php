<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title_01', 'title_02', 'page','image', 'active'
    ];
}
