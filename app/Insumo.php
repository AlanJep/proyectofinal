<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public function  tproductos(){

    	return $this->belongsToMany('DentalS\Tproducto');
    }
}
