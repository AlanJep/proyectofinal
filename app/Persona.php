<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table="persona";
	protected $primaryKey="idpersona";
	
    protected $fillable=['nombres',
    	'telefono',
    	'direccion',
    	'nro_documento'];  
}
