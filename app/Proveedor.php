<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedores";
	protected $primaryKey="idproveedor";
	
    protected $fillable=['estado',
    	'entidad',
    	'persona_id']; 
}
