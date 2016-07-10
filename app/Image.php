<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = "images";
    protected $fillable = ['nombre','horse_id'];

    public function horse(){	
    	return $this->belongsTo('App\Horse');
    }

}
