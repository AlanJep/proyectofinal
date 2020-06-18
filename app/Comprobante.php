<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table="comprobante";
	protected $primaryKey="idcomprobante";
	
    protected $fillable=['nombre']; 
}
