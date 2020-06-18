<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
    	$estado=Auth::user()->estado;
    	if($estado!="Activo"){
    		Auth::logout();
    		$notificacion= array('message' =>'El usuario se encuentra inactivo, no puede ingresar. Por favor comuniquese con el administrador' , 'alert-type'=>'error');
	    	return Redirect::to('login')->with($notificacion);
    	}
    	$stock=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->select('p.id as pid','p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria')
            ->where('p.stock','<=',20)
            ->first();

        if($stock){
        	foreach ($stock as $row) {
				$array = array();
				$array[0] = $row[0];
				$cantidad[] = $array;
			}
        }else{
        	$cantidad[0]="sn";
        }
        

        $hoy=date("Y-m-d");
    	$fecha_venc=date("Y-m-d",strtotime($hoy."+ 1 month"));
        $vence=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->join('detalle_ingreso as d','p.id','=','d.producto_id')
            ->select('p.id as pid','p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria','d.fecha_venc')
            ->where('d.fecha_venc','<=',$fecha_venc)
            ->first();

        if($vence){
        	foreach ($vence as $row) {
				$array = array();
				$array[0] = $row[0];
				$fechas[] = $array;
			}
        }else{
        	$fechas[0]="sf";
        }

    	// $notificacion= array('message' =>'Producto guardado' , 'alert-type'=>'info');
        return view('layouts.inicio',["stock"=>$cantidad,"vence"=>$fechas]);
    }
}
