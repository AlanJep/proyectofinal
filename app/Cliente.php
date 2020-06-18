<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="clientes";
	protected $primaryKey="idcliente";
	
    protected $fillable=['estado',
    	'persona_id']; 
}
