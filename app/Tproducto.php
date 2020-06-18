<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Tproducto extends Model

{
	 protected $fillable=['nombre','descri','perfil','cantidad','preciotp','preciocu','preciovu'];  
    public function getRouteKeyName()
    {
    	return 'nombre';
    }

     public function  instrus(){

    	return $this->belongsToMany('DentalS\instru');
    }

     public function  insumos(){

    	return $this->belongsToMany('DentalS\Insumo');
    }

   
     public function  medicas(){

    	return $this->belongsToMany('DentalS\medica');
    }
}
