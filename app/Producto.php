<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    protected $table='productos';
    protected $primaryKey='id';
    protected $fillable=['nombre','descripcion','imagen','precio','stock','categoria_id'];  

    // public function getRouteKeyName()
    // {
    // 	return 'nombre';
    // }
}
