<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['nombre'];

    public function horses(){
    	return $this->belongsTo('App\Horse');
    }

}
