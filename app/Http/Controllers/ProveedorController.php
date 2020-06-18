<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DentalS\persona;
use DentalS\proveedor;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Support\Facades\Auth;

use DentalS\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use DB;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('proveedor.index');        
    }

    public function data(Datatables $datatables){
         $query=DB::table('persona as p')
            ->join('proveedores as pr','p.idpersona','=','pr.persona_id')
            ->select('p.idpersona','p.nombres','p.apellidos','p.telefono','p.direccion','p.lnro','p.lnros','p.nro_documento','pr.idproveedor','pr.estado')
            ->orderBy('p.nombres','asc')
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      return view("proveedor.create");
    }

    public function store(PersonaFormRequest $request){
        $persona= new Persona();
        $persona->nombres= $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->telefono= $request->get('telefono');
        $persona->direccion= $request->get('direccion');
        $persona->lnro= $request->get('nrol');
        $persona->lnros= $request->get('lnros');
        $persona->nro_documento= $request->get('nro');
        $persona->save();

        $proveedor=new proveedor();
        $proveedor->estado= "Activo";
        $proveedor->entidad= $request->get('entidad');
        $proveedor->nacionalidad= $request->get('nacionalidad');
        $proveedor->nit= $request->get('nit');
        $proveedor->persona_id= $persona->idpersona;
        $proveedor->usuario_id=Auth::id();
        $proveedor->fecha_reg=date("Y-m-d");
        $proveedor->save();

        $notificacion= array('message' =>'Proveedor guardado' , 'alert-type'=>'info');
        return Redirect::to('proveedor')->with($notificacion);
    }

    public function edit($id){
        $proveedor=Proveedor::findOrFail($id);
        $persona=Persona::findOrFail($proveedor->persona_id);
        $nacionalidad = array('Argentina','Bolivia','Brazil','Chile','Paraguay','Peru','Uruguay');
        return view("proveedor.edit",["proveedor"=>$proveedor,"persona"=>$persona,"nacionalidad"=>$nacionalidad]);
    }

     public function update(PersonaFormRequest $request,$id){
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->entidad= $request->get('entidad');
        $proveedor->nacionalidad= $request->get('nacionalidad');
        $proveedor->nit= $request->get('nit');
        $proveedor->update();

        $persona=Persona::findOrFail($proveedor->persona_id);
        $persona->nombres= $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->telefono= $request->get('telefono');
        $persona->direccion= $request->get('direccion');
        $persona->lnro= $request->get('nrol');
        $persona->lnros= $request->get('lnros');
        $persona->nro_documento= $request->get('nro');
        $persona->update();

        $notificacion= array('message' =>'proveedor actualizado' , 'alert-type'=>'success');
        return Redirect::to('proveedor')->with($notificacion);
      }

      public function verproducto($id){
        $producto=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->select('p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria')
            ->where('p.id','=',$id)
            ->first();

        return view('producto/show')->with('producto',$producto);
    }

     public function estado($id){
        $proveedor=Proveedor::FindOrFail($id);
        if($proveedor->estado=="Activo"){
            $estado="Inactivo";
        }else{
            $estado="Activo";
        }
        $proveedor->estado=$estado;
        $proveedor->update();
        
        // return redirect()->route('proveedor.index');
        $notificacion= array('message' =>'Se cambio el estado a '.$proveedor->estado , 'alert-type'=>'info');
        return Redirect::to('proveedor')->with($notificacion);
    }
    public function verproveedor($id){
        $datos=DB::table('proveedores as pr')
            ->join('persona as p','pr.persona_id','=','p.idpersona')
            ->select('pr.*','p.nombres','p.apellidos','p.telefono','p.direccion','p.lnro','p.lnros','p.nro_documento')
            ->where('pr.idproveedor','=',$id)
            ->first();

        return view('proveedor/show')->with('datos',$datos);
    }
     public function reviseNit(){
        $nit= Input::get('valor');
        $datos=DB::table('clientes')
            ->select('nit','estado')
            ->where('nit','=',$nit)
            ->get()->first();

         $datos2=DB::table('proveedores')
            ->select('nit','estado')
            ->where('nit','=',$nit)
            ->get()->first();

        if(!empty($datos)){
            $data=$datos;
        }
        if(!empty($datos2)){
            $data=$datos2;
        }
        if(empty($data) ){
            $data['nit']=0;
        }
        return Response::json($data);
    }
}
