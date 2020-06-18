<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class medica extends Model
{
    public function  tproductos(){

    	return $this->belongsToMany('DentalS\Tproducto');
    }
}
