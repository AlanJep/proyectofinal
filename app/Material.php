<?php

namespace DentalS;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table="material";
	protected $primaryKey="idmaterial";
	
    protected $fillable=['material'];  
}
