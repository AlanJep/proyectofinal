<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table="ingreso";
	protected $primaryKey="idingreso";
	
    protected $fillable=['nro_documento',
    	'fecha_i',
    	'total',
    	'estado',
    	'comprobante_id',
    	'proveedor_id',
    	'usuario_id'
    ]; 
}
