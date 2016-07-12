<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
	protected $table = "horses";
    protected $fillable = ['nombre','edad','descripcion','padre','madre','sexo','ubicacion','category_id','user_id'];

    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }

}
