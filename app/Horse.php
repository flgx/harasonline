<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    protected $fillable = ['nombre','edad','descripcion','padre','madre','sexo','ubicacion','categoria','external_id'];

    public function images(){
    	return $this->hasMany('App\Image');
    }

}
