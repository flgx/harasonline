<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Horse extends Model
{
    use Sluggable;
	protected $table = "horses";
    protected $fillable = ['nombre','edad','descripcion','padre','madre','sexo','ubicacion','category_id','user_id','slug','video_url'];

    public function images(){
    	return $this->hasMany('App\Image');
    }
    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }

}
