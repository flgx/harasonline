<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
	protected $table = 'horses';
    protected $fillable = ['nombre','edad','descripcion','padre','madre','sexo','ubicacion'];

    public function images(){
    	return $this->hasMany('App\Image');
    }

}
