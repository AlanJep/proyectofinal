<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class instru extends Model
{

      protected $fillable=['material'];  
    public function getRouteKeyName()
    {
    	return 'nombre';
    }

    public function  tproductos(){

    	return $this->belongsToMany('DentalS\Tproducto');
    }
}
