<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table="categorias";
	protected $primaryKey="id";
	
    protected $fillable=['nombre','descri','perfil'];  

    public function getRouteKeyName()
    {
    	return 'nombre';
    }
}
