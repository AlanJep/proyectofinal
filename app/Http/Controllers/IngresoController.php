<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;

use DentalS\comprobante;
use Response;
use Illuminate\Support\Facades\Input;
use DentalS\producto;
use DentalS\categoria;
use DentalS\ingreso;
use DentalS\DetalleIngreso;
use DentalS\persona;
use DentalS\proveedor;
use DentalS\marca;

use DentalS\Http\Requests\IngresoFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use DB;

class IngresoController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('ingreso.index');        
    }

    public function data(Datatables $datatables){
        $query=DB::table('ingreso as i')
            ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
            ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
            ->join('users as u','i.usuario_id','=','u.id')
            ->join('persona as p','pr.persona_id','=','p.idpersona')
            ->select('i.idingreso','p.nombres','c.nombre','i.nro_documento','i.fecha_i','i.total')
            ->orderBy('idingreso','desc')
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      $comprobante=Comprobante::all();
      $marca=Marca::all();
      return view("ingreso.create",["comprobante"=>$comprobante,"marca"=>$marca]);
    }

    public function autocomplete(){
		$queries=Producto::where(function($query){
			$term= Input::get('valor')		;
			$query->where('nombre','like','%'.$term.'%');
		})->get();
		foreach($queries as $query){
			$results[]=['id'=>$query->id, 'value'=> $query->nombre,'stock'=> $query->stock,'precio'=> $query->precio];
		}
		if(!isset($results)){
			$results="";
		}
		return Response::json($results);
	}
	
	public function comprobante(){
		$idc= Input::get('valor');

    	$datos=DB::table('ingreso as i')
	    	->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
	    	->select(DB::raw('MAX(i.nro_documento) AS nro'))
	    	->where('i.comprobante_id','=',$idc)
	    	->where('i.fecha_i','>=',date("Y")."-01-01")
	    	->where('i.fecha_i','<=',date("Y")."-12-31")
	    	->get()->first();

    	if($datos->nro < 0 || empty($datos->nro)){
    		$datos->nro=0;
    	}
    	$datos->nro++;
		return Response::json($datos);
	}
    public function categoria(){
        $idp= Input::get('valor');

        $producto=Producto::findOrFail($idp);
        $categoria=Categoria::findOrFail($producto->categoria_id);
        // $results=['idc'=>$comp->idcomprobante, 'nombre'=>$comp->nombre];     
        return Response::json($categoria);
    }
    public function revise_nro(){
        $idm= Input::get('idm');
        $nro= Input::get('nro');

        $datos=DB::table('ingreso as i')
            ->select('nro_documento')
            ->where('comprobante_id','=',$idm)
            ->where('nro_documento','=',$nro)
            ->where('fecha_i','>=',date("Y")."-01-01")
            ->where('fecha_i','<=',date("Y")."-12-31")
            ->get()->first();
        if(empty($datos)){
            $datos['nro_documento']=0;
        }
        return Response::json($datos);
    }

    public function nproveedor(){
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

        $proveedor=new proveedor();
        $proveedor->estado= "Activo";
        $proveedor->entidad= Input::get('entidad');
        $proveedor->nacionalidad= Input::get('nacionalidad');
        $proveedor->nit= Input::get('nit');
        $proveedor->persona_id= $persona->idpersona;
        $proveedor->usuario_id=Auth::id();
        $proveedor->fecha_reg=date("Y-m-d");
        $proveedor->save();

        $nrodc="";
        if(!empty($lnro)){
            if(!empty($lnros)){
                $nrodc=$lnro.$lnros."-";
            }else{
                $nrodc=$lnro."-";
            }
        }
        $nrodc=$nrodc.$persona->nro_documento;

        $datos= array('nombre' => $persona->nombres, 'idelegido' => $proveedor->idproveedor, 'nro_documento' =>$nrodc  );

        return Response::json($datos);
    }

    public function revise_documento(){
        $nro= Input::get('valor');
        $lnro= Input::get('lnro');
        $lnros= Input::get('lnros');
        $datos=DB::table('persona')
            ->select('nro_documento','lnro','lnros')
            ->where('lnro','=',$lnro)
            ->where('lnros','=',$lnros)
            ->where('nro_documento','=',$nro)
            ->get()->first();
        if(empty($datos)){
            $datos['nro_documento']=0;
        }
        return Response::json($datos);
    }

    public function store(IngresoFormRequest $request){
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso;
            $ingreso->nro_documento=$request->get('dnro_m');            
            $ingreso->fecha_i=$request->get('fecha');
            $ingreso->estado="Activo";
            $ingreso->comprobante_id=$request->get('merc');
            $ingreso->proveedor_id=$request->get('dperson_id');
            $ingreso->usuario_id=Auth::id();
            $ingreso->total=0;
            $ingreso->save();

            $idproductos=$request->get('idproductos');
            $precios=$request->get('precios');
            $preciosv=$request->get('preciosv');
            $cantidades=$request->get('cantidades');
            $fechas=$request->get('fechas');
            $precio_venta=$request->get('precio_venta');
            $idmarca=$request->get('idmarca');

            $ideingreso=$ingreso->idingreso;
            $cont=0;
            $total=0;

            while($cont<count($idproductos)){
                $detalle=new DetalleIngreso();
                $detalle->cantidad=$cantidades[$cont];
                $detalle->precio=$precios[$cont];
                $detalle->preciov=$preciosv[$cont];
                $detalle->subtotal=$precios[$cont]*$cantidades[$cont];
                $detalle->producto_id=$idproductos[$cont];
                $detalle->ingreso_id=$ingreso->idingreso;
                $detalle->cantidadi=$cantidades[$cont];
                $detalle->fecha_venc=$fechas[$cont];
                $detalle->fecha_comp=date("Y-m-d");
                $detalle->marca_id=$idmarca[$cont];
                $detalle->save();

                $productom=Producto::findOrFail($idproductos[$cont]);
                $productom->stock=$productom->stock+$cantidades[$cont];
                $productom->update();

                $total+=$precios[$cont]*$cantidades[$cont];
                
                $cont=$cont+1;
            }

            $ingresom=Ingreso::findOrFail($ingreso->idingreso);
            $ingresom->total=$total;
            $ingresom->update();

            DB::commit();
            
        }catch(Exception $e){
            DB::rollback();
        }

        return Redirect::to('ingreso/'.$ideingreso);
    }

    public function show($id){
        $ingresov=DB::table('ingreso as i')
            ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
            ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
            ->join('users as u','i.usuario_id','=','u.id')
            ->join('persona as p','pr.persona_id','=','p.idpersona')
            ->select('i.idingreso','p.nombres','p.nro_documento','p.lnro','p.lnros','c.nombre','i.nro_documento as nroc','i.fecha_i','i.total')
            ->where('i.idingreso','=',$id)
            ->first();

        $detallev=DB::table('detalle_ingreso as d')
            ->join('productos as p','d.producto_id','=','p.id')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->join('ingreso as i','d.ingreso_id','=','i.idingreso')
            ->select('d.cantidad','d.precio','d.preciov','d.subtotal','d.fecha_venc','m.marca','p.nombre')
            ->where('i.idingreso','=',$id)
            ->get();
        return view("ingreso.showDetail",["ingreso"=>$ingresov, "detalle"=>$detallev]);
    }

    public function veringreso($id){
         $ingreso=DB::table('ingreso as i')
            ->join('proveedores as pr','i.proveedor_id','=','pr.idproveedor')
            ->join('comprobante as c','i.comprobante_id','=','c.idcomprobante')
            ->join('users as u','i.usuario_id','=','u.id')
            ->join('persona as p','pr.persona_id','=','p.idpersona')
            ->select('i.idingreso','p.nombres','p.nro_documento','p.lnro','p.lnros','c.nombre','i.nro_documento as nroc','i.fecha_i','i.total')
            ->where('i.idingreso','=',$id)
            ->first();

        $detalle=DB::table('detalle_ingreso as d')
            ->join('productos as p','d.producto_id','=','p.id')
            ->join('marca as m','d.marca_id','=','m.idmarca')
            ->join('ingreso as i','d.ingreso_id','=','i.idingreso')
            ->select('d.cantidad','d.precio','d.preciov','d.subtotal','d.fecha_venc','m.marca','p.nombre')
            ->where('i.idingreso','=',$id)
            ->get();

            return view("ingreso.show",["ingreso"=>$ingreso, "detalle"=>$detalle]);
    }
    public function marca(){
        $mar= Input::get('valor');
        $marca= new Marca();
        $marca->marca= $mar;
        $marca->save();

        $tmarca=Marca::all();

        return Response::json($tmarca);
    }
}
