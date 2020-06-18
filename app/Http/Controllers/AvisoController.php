<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Input;

class AvisoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function cantidad(){
       return View('aviso.cantidad');        
    }

    public function dataCantidad(Datatables $datatables){
        $query=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->select('p.id as pid','p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria')
            ->where('p.stock','<=',20)
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function fecha(){
       return View('aviso.fecha');        
    }
    public function dataFecha(Datatables $datatables){
    	$hoy=date("Y-m-d");
    	$fecha_venc=date("Y-m-d",strtotime($hoy."+ 1 month"));
        $query=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->join('detalle_ingreso as d','p.id','=','d.producto_id')
            ->select('p.id as pid','p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria','d.fecha_venc')
            ->where('d.fecha_venc','<=',$fecha_venc)
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }
}
