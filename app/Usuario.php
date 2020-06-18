<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
      protected $fillable=['nombre','descri','perfil'];  
    public function getRouteKeyName()
    {
    	return 'nombre';
    }
}
