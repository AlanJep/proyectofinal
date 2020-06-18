<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table="detalle_ingreso";
	protected $primaryKey="iddetalle";
	
    protected $fillable=['cantidad',
    	'precio',
    	'subtotal',
    	'producto_id',
    	'ingreso_id',
    	'cantidadi',
    	'fecha_venc'
    ]; 
}
