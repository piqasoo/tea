<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'manager', 
    	'mail_01', 
    	'mail_02', 
    	'facebook', 
    	'instagram', 
    	'twitter', 
    	'youtube', 
    	'description', 
        'keywords'
    ];
}
