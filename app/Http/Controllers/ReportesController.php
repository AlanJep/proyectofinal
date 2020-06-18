<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;

use DentalS\User;
use DentalS\Proveedor;
use Illuminate\Support\Facades\Auth;
use DB;

class ReportesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       // return View('proveedor.index');        
    }

    public function ingreso(){
    	$usuarios=User::all();
       return View('reporte.ingresos',["usuarios"=>$usuarios]);        
    }
    public function verIngresos($id,$fe,$fe2){
    	// $fecha=$fe." 0:00:00";
    	$fecha=$fe;
    	$fecha2=$fe2;

        $usuario=Auth::user();

        if($id!="Todos"){
            $ingresos=DB::table('ingreso as i')
            	->join('users as u','i.usuario_id','=','u.id')
                ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
                ->select('i.*','p.nombres as proveedor','u.name','c.nombre')
                ->where('i.usuario_id','=',$id)
                ->whereBetween('i.fecha_i',[$fecha, $fecha2])
                ->get();
            
        }else{
             $ingresos=DB::table('ingreso as i')
                ->join('users as u','i.usuario_id','=','u.id')
                ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
                ->select('i.*','p.nombres as proveedor','u.name','c.nombre')
                ->whereBetween('i.fecha_i',[$fecha, $fecha2])
                ->get();
                // ->where('v.estado','=','a')
        }
        return view('reporte.detalleIngreso',["ingresos"=>$ingresos,"usuario"=>$usuario]);
    }

    public function venta(){
    	$usuarios=User::all();
       return View('reporte.ventas',["usuarios"=>$usuarios]);        
    }
    public function verVentas($id,$fe,$fe2){
    	$fecha=$fe;
    	$fecha2=$fe2;

        $usuario=Auth::user();

        if($id!="Todos"){
            $ventas=DB::table('ventas as v')
            	->join('users as u','v.usuario_id','=','u.id')
                ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
                ->select('v.*','p.nombres as cliente','u.name','c.nombre')
                ->where('v.usuario_id','=',$id)
                ->whereBetween('v.fecha_v',[$fecha, $fecha2])
                ->get();
            
        }else{
             $ventas=DB::table('ventas as v')
                ->join('users as u','v.usuario_id','=','u.id')
                ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
                ->select('v.*','p.nombres as cliente','u.name','c.nombre')
                ->whereBetween('v.fecha_v',[$fecha, $fecha2])
                ->get();
        }
        return view('reporte.detalleVenta',["ventas"=>$ventas,"usuario"=>$usuario]);
    }
    public function proveedor(){
        $proveedor=DB::table('proveedores as pr')
            ->join('persona as p','pr.persona_id','=','p.idpersona')
            ->select('p.*','pr.idproveedor','pr.nit','pr.estado')
            ->get();
       return View('reporte.proveedor',["proveedor"=>$proveedor]);        
    }
    public function verProveedores($id,$fe,$fe2){
        $fecha=$fe;
        $fecha2=$fe2;

        $usuario=Auth::user();

        if($id!="Todos"){
            $proveedores=DB::table('ingreso as i')
                ->join('users as u','i.usuario_id','=','u.id')
                ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
                ->select('i.*','p.nombres as proveedor','u.name','c.nombre')
                ->where('i.proveedor_id','=',$id)
                ->whereBetween('i.fecha_i',[$fecha, $fecha2])
                ->get();
            
        }else{
             $proveedores=DB::table('ingreso as i')
                ->join('users as u','i.usuario_id','=','u.id')
                ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
                ->select('i.*','p.nombres as proveedor','u.name','c.nombre')
                ->whereBetween('i.fecha_i',[$fecha, $fecha2])
                ->get();
        }
        return view('reporte.detalleProveedor',["proveedores"=>$proveedores,"usuario"=>$usuario]);
    }
    public function cliente(){
        $cliente=DB::table('clientes as cl')
            ->join('persona as p','cl.persona_id','=','p.idpersona')
            ->select('p.*','cl.idcliente','cl.nit','cl.estado')
            ->get();
       return View('reporte.cliente',["cliente"=>$cliente]);        
    }
    public function verClientes($id,$fe,$fe2){
        $fecha=$fe;
        $fecha2=$fe2;

        $usuario=Auth::user();

        if($id!="Todos"){
            $ventas=DB::table('ventas as v')
                ->join('users as u','v.usuario_id','=','u.id')
                ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
                ->select('v.*','p.nombres as cliente','u.name','c.nombre')
                ->where('v.cliente_id','=',$id)
                ->whereBetween('v.fecha_v',[$fecha, $fecha2])
                ->get();
            
        }else{
             $ventas=DB::table('ventas as v')
                ->join('users as u','v.usuario_id','=','u.id')
                ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
                ->select('v.*','p.nombres as cliente','u.name','c.nombre')
                ->whereBetween('v.fecha_v',[$fecha, $fecha2])
                ->get();
        }
        return view('reporte.detalleCliente',["ventas"=>$ventas,"usuario"=>$usuario]);
    }
    public function registros(){
       $usuarios=User::all();
       return View('reporte.registros',["usuarios"=>$usuarios]); 
    }
    public function regproveedor($id,$fe,$fe2){
        $fecha=$fe;
        $fecha2=$fe2;

        $usuario=Auth::user();
        if($id!="Todos"){
            $proveedores=DB::table('proveedores as pr')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('users as u','pr.usuario_id','=','u.id')
                ->select('pr.*','u.name','p.nombres','p.apellidos')
                ->where('u.id','=',$id)
                ->whereBetween('pr.fecha_reg',[$fecha, $fecha2])
                ->get();
            
        }else{
            $proveedores=DB::table('proveedores as pr')
                ->join('persona as p','pr.persona_id','=','p.idpersona')
                ->join('users as u','pr.usuario_id','=','u.id')
                ->select('pr.*','u.name','p.nombres','p.apellidos')
                ->whereBetween('pr.fecha_reg',[$fecha, $fecha2])
                ->get();
        }

        return view('reporte.detalleRegproveedor',["proveedores"=>$proveedores,"usuario"=>$usuario]);
    }
    public function regcliente($id,$fe,$fe2){
        $fecha=$fe;
        $fecha2=$fe2;

        $usuario=Auth::user();
        if($id!="Todos"){
            $clientes=DB::table('clientes as cl')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('users as u','cl.usuario_id','=','u.id')
                ->select('cl.*','u.name','p.nombres','p.apellidos','p.nro_documento')
                ->where('u.id','=',$id)
                ->whereBetween('cl.fecha_reg',[$fecha, $fecha2])
                ->get();
            
        }else{
            $clientes=DB::table('clientes as cl')
                ->join('persona as p','cl.persona_id','=','p.idpersona')
                ->join('users as u','cl.usuario_id','=','u.id')
                ->select('cl.*','u.name','p.nombres','p.apellidos','p.nro_documento')
                ->whereBetween('cl.fecha_reg',[$fecha, $fecha2])
                ->get();
        }

        return view('reporte.detalleRegcliente',["clientes"=>$clientes,"usuario"=>$usuario]);
    }
}
