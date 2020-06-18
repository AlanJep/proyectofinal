<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table="ventas";
	protected $primaryKey="idventa";
	
    protected $fillable=['nro_documento',
    	'fecha_v',
    	'total',
    	'estado',
    	'comprobante_id',
    	'cliente_id',
    	'usuario_id'
    ];
}
