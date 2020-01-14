<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['image', 'link', 'ord', 'title_01', 'title_02'];
}
