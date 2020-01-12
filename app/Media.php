<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $casts = [
        'id' => 'string'
    ];
    
	protected $fillable = ['id', 'media_key', 'media_value', 'mediable_id', 'mediable_type', 'extension'];

    public function mediable()
    {
    	return $this->morphTo();
    }
}
