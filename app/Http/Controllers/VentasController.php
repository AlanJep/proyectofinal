<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DentalS\Venta;

use DentalS\comprobante;

use Response;
use Illuminate\Support\Facades\Input;
use DentalS\producto;
use DentalS\cliente;
use DentalS\persona;

// use DentalS\categoria;
use DentalS\DetalleVenta;
use DentalS\DetalleIngreso;

use DentalS\Http\Requests\VentaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use DB;

class VentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('venta.index');        
    }

    public function data(Datatables $datatables){
        $query=DB::table('ventas as v')
            ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
            ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
            ->join('users as u','v.usuario_id','=','u.id')
            ->join('persona as p','cl.persona_id','=','p.idpersona')
            ->select('v.idventa','p.nombres','c.nombre','v.nro_documento','v.fecha_v','v.total')
            ->orderBy('idventa','desc')
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      $comprobante=Comprobante::all();
      return view("venta.create",["comprobante"=>$comprobante]);
    }

    public function autocomplete(){
        $queries=Producto::where(function($query){
            $term= Input::get('valor');
            $query->where('nombre','like','%'.$term.'%');
        })->get();

        foreach($queries as $query){
            $results[]=['id'=>$query->id, 'value'=> $query->nombre,'stock'=> $query->stock,'precio'=> $query->precio,'contiene'=>$query->contiene];
        }
        if(!isset($results)){
            $results="";
        }
        return Response::json($results);
    }
    public function fechasp(){
        $idp= Input::get('valor');
         $query=DB::table('detalle_ingreso as d')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->select('d.iddetalle','d.fecha_venc','d.cantidadi','d.preciov','d.unidades','m.idmarca','m.marca')
            ->where('d.producto_id','=',$idp)
            ->where('d.cantidadi','>',0)
            ->get();
        if(empty($query)){
           $query=0; 
        }
        return Response::json($query);
    }
    public function fechascp(){
        $idp= Input::get('valor');
         $query=DB::table('detalle_ingreso as d')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->select('d.iddetalle','d.fecha_comp','d.cantidadi','d.preciov','m.idmarca','m.marca')
            ->where('d.producto_id','=',$idp)
            ->where('d.cantidadi','>',0)
            ->get();
        if(empty($query)){
           $query=0; 
        }
        return Response::json($query);
    }
    public function precioprom(){
        $idp= Input::get('valor');
         $query=DB::table('detalle_ingreso')
            ->select(DB::raw('avg(preciov) as promedio'))
            ->where('producto_id','=',$idp)
            ->first();
        if(empty($query)){
           $query=0; 
        }
        return Response::json($query);
    }
    
    public function comprobante(){
        $idc= Input::get('valor');

        $datos=DB::table('ventas as v')
            ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
            ->select(DB::raw('MAX(v.nro_documento) AS nro'))
            ->where('v.comprobante_id','=',$idc)
            ->where('v.fecha_v','>=',date("Y")."-01-01")
            ->where('v.fecha_v','<=',date("Y")."-12-31")
            ->get()->first();

        if($datos->nro < 0 || empty($datos->nro)){
            $datos->nro=0;
        }
        $datos->nro++;
        return Response::json($datos);
    }
    // public function categoria(){
    //     $idp= Input::get('valor');

    //     $producto=Producto::findOrFail($idp);
    //     $categoria=Categoria::findOrFail($producto->categoria_id);
    //     // $results=['idc'=>$comp->idcomprobante, 'nombre'=>$comp->nombre];     
    //     return Response::json($categoria);
    // }
     public function revise_nro(){
        $idm= Input::get('idm');
        $nro= Input::get('nro');

        $datos=DB::table('venta')
            ->select('nro_documento')
            ->where('comprobante_id','=',$idm)
            ->where('nro_documento','=',$nro)
            ->where('fecha_v','>=',date("Y")."-01-01")
            ->where('fecha_v','<=',date("Y")."-12-31")
            ->get()->first();
        if(empty($datos)){
            $datos['nro_documento']=0;
        }
        return Response::json($datos);
    }

    public function ncliente(){
        $lnro=Input::get('lnro');
        $lnros=Input::get('lnros');
        $persona= new Persona();
        $persona->nombres= Input::get('nombres');
        $persona->telefono= Input::get('telefono');
        $persona->direccion= Input::get('direccion');
        $persona->nro_documento= Input::get('nro');
        $persona->apellidos= Input::get('apellidos');
        $persona->lnro= $lnro;
        $persona->lnros= $lnros;

        $persona->save();

        $cliente=new cliente();
        $cliente->estado= "Activo";
        $cliente->persona_id= $persona->idpersona;
        $cliente->nit= Input::get('nit');
        $cliente->usuario_id=Auth::id();
        $cliente->fecha_reg=date("Y-m-d");
        $cliente->save();

        $nrodc="";
        if(!empty($lnro)){
            if(!empty($lnros)){
                $nrodc=$lnro.$lnros."-";
            }else{
                $nrodc=$lnro."-";
            }
        }
        $nrodc=$nrodc.$persona->nro_documento;

        $datos= array('nombre' => $persona->nombres, 'idelegido' => $cliente->idcliente, 'nro_documento' =>$nrodc);;

        return Response::json($datos);
    }

    public function store(VentaFormRequest $request){
        try{
            DB::beginTransaction();
            $venta=new Venta;
            $venta->nro_documento=$request->get('dnro_m');            
            $venta->fecha_v=$request->get('fecha');
            $venta->estado="Activo";
            $venta->comprobante_id=$request->get('merc');
            $venta->cliente_id=$request->get('dperson_id');
            $venta->usuario_id=Auth::id();
            $venta->total=0;
            $venta->save();

            $idproductos=$request->get('idproductos');
            $precios=$request->get('precios');
            $cantidades=$request->get('cantidades');
            $fechas=$request->get('fechas');
            $iddetallec=$request->get('iddec');
            $categorias=$request->get('categorias');
            $idmarcas=$request->get('idmarcas');

            $cont=0;
            $total=0;
            $ideventa=$venta->idventa;

            while($cont<count($idproductos)){
                $datos=explode("*", $categorias[$cont]);
                $categ=$datos[0];

                $detalle=new DetalleVenta();
                $detalle->cantidad=$cantidades[$cont];
                $detalle->preciov=$precios[$cont];
                $detalle->subtotal=$precios[$cont]*$cantidades[$cont];
                $detalle->producto_id=$idproductos[$cont];
                $detalle->venta_id=$venta->idventa;
                $detalle->marca_id=$idmarcas[$cont];
                $tipouni="Unitario";
                if($categ=="Insumos"){
                    $tunid=$datos[1];
                    if($tunid=="Unidad"){
                        $tipouni="Unidad";
                    }else{
                        $tipouni="Paquete";
                    }
                }
                $detalle->unidad=$tipouni;
                $detalle->fecha_venc=$fechas[$cont];
                $detalle->save();

                $productom=Producto::findOrFail($idproductos[$cont]);
                if($iddetallec[$cont]!="no"){
                    $detalle_in=DetalleIngreso::findOrFail($iddetallec[$cont]);
                }
                
                if($categ=="Insumos"){
                    $tunid=$datos[1];
                    if($tunid=="Unidad"){
                        $cantidadi=$datos[2];
                        $unidades=$datos[3];  

                        $nuecantidadi=$cantidadi;
                        $detalle_in->unidades=$unidades;
                        $ncant=$detalle_in->cantidad-$cantidadi;

                        $nuecantidad=$productom->stock-$ncant;
                    }else{
                        $nuecantidadi=$detalle_in->cantidadi-$cantidades[$cont];

                        $nuecantidad=$productom->stock-$cantidades[$cont];
                    }
                }
                else{
                    if($iddetallec[$cont]!="no"){
                        $nuecantidadi=$detalle_in->cantidadi-$cantidades[$cont];
                    }
                    $nuecantidad=$productom->stock-$cantidades[$cont];
                }

                // if($categ != "Instrumentos"){
                    $detalle_in->cantidadi=$nuecantidadi;
                    $detalle_in->update();
                // }

                $productom->stock=$nuecantidad;
                $productom->update();
                
                $total+=$precios[$cont]*$cantidades[$cont];
                $cont=$cont+1;
            }

            $ventam=Venta::findOrFail($venta->idventa);
            $ventam->total=$total;
            $ventam->update();

            DB::commit();
            
        }catch(Exception $e){
            DB::rollback();
        }

        // return $this->show($ideventa);
        return Redirect::to('venta/'.$ideventa);
    }
    public function show($id){
         $venta=DB::table('ventas as v')
            ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
            ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
            ->join('users as u','v.usuario_id','=','u.id')
            ->join('persona as p','cl.persona_id','=','p.idpersona')
            ->select('v.idventa','p.nombres','p.nro_documento','p.lnro','p.lnros','c.nombre','v.nro_documento as nroc','v.fecha_v','v.total')
            ->where('v.idventa','=',$id)
            ->first();
         $detalle=DB::table('detalle_venta as d')
            ->join('productos as p','d.producto_id','=','p.id')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->join('ventas as v','d.venta_id','=','v.idventa')
            ->select('d.cantidad','d.preciov','d.subtotal','d.fecha_venc','d.unidad','p.nombre','m.marca')
            ->where('v.idventa','=',$id)
            ->get();
        return view('venta.showDetail',["venta"=>$venta,"detalle"=>$detalle]);
    }


    public function verVenta($id){
         $ventav=DB::table('ventas as v')
            ->join('clientes as cl','v.cliente_id','=','cl.idcliente')
            ->join('comprobante as c','v.comprobante_id','=','c.idcomprobante')
            ->join('users as u','v.usuario_id','=','u.id')
            ->join('persona as p','cl.persona_id','=','p.idpersona')
            ->select('v.idventa','p.nombres','p.nro_documento','p.lnro','p.lnros','c.nombre','v.nro_documento as nroc','v.fecha_v','v.total')
            ->where('v.idventa','=',$id)
            ->first();

        $detalle=DB::table('detalle_venta as d')
            ->join('productos as p','d.producto_id','=','p.id')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->join('ventas as v','d.venta_id','=','v.idventa')
            ->select('d.cantidad','d.preciov','d.subtotal','d.fecha_venc','d.unidad','p.nombre','m.marca')
            ->where('v.idventa','=',$id)
            ->get();
      
            return view("venta.show",["venta"=>$ventav, "detalle"=>$detalle]);
    }
}
