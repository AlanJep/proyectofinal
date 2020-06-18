<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table="detalle_venta";
	protected $primaryKey="iddetallev";
	
    protected $fillable=['cantidad',
    	'preciov',
    	'subtotal',
    	'producto_id',
    	'venta_id',
    	'unidad',
    	'fecha_venc'
    ]; 
}
