<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table="marca";
	protected $primaryKey="idmarca";
	
    protected $fillable=['marca']; 
}
