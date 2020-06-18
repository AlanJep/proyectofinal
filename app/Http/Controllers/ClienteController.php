<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;

use DentalS\persona;
use DentalS\cliente;
use Illuminate\Support\Facades\Auth;

use DentalS\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use DB;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('cliente.index');        
    }

    public function data(Datatables $datatables){
        $query=DB::table('persona as p')
            ->join('clientes as cl','p.idpersona','=','cl.persona_id')
            ->select('p.idpersona','p.nombres','p.apellidos','p.telefono','p.direccion','p.lnro','p.lnros','p.nro_documento','cl.idcliente','cl.estado')
            ->orderBy('p.nombres','asc')
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      return view("cliente.create");
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

        $cliente=new cliente();
        $cliente->estado= "Activo";
        $cliente->nit= $request->get('nit');
        $cliente->persona_id= $persona->idpersona;
        $cliente->usuario_id=Auth::id();
        $cliente->fecha_reg=date("Y-m-d");
        $cliente->save();

        $notificacion= array('message' =>'Cliente guardado' , 'alert-type'=>'info');
        return Redirect::to('cliente')->with($notificacion);
    }

    public function edit($id){
        $cliente=cliente::findOrFail($id);
        $persona=Persona::findOrFail($cliente->persona_id);
        return view("cliente.edit",["cliente"=>$cliente,"persona"=>$persona]);
    }

     public function update(PersonaFormRequest $request,$id){
        $cliente=Cliente::findOrFail($id);
        $cliente->nit= $request->get('nit');
        $cliente->update();

        $persona=Persona::findOrFail($cliente->persona_id);
        $persona->nombres= $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->telefono= $request->get('telefono');
        $persona->direccion= $request->get('direccion');
        $persona->lnro= $request->get('nrol');
        $persona->lnros= $request->get('lnros');
        $persona->nro_documento= $request->get('nro');
        $persona->update();
        
        $notificacion= array('message' =>'cliente actualizado' , 'alert-type'=>'success');
        return Redirect::to('cliente')->with($notificacion);
      }
   public function estado($id){
        $cliente=Cliente::FindOrFail($id);
        if($cliente->estado=="Activo"){
            $estado="Inactivo";
        }else{
            $estado="Activo";
        }
        $cliente->estado=$estado;
        $cliente->update();
        
        $notificacion= array('message' =>'Se cambio el estado del cliente a '.$cliente->estado , 'alert-type'=>'info');
        return Redirect::to('cliente')->with($notificacion);
    }
    public function vercliente($id){
        $datos=DB::table('clientes as cl')
            ->join('persona as p','cl.persona_id','=','p.idpersona')
            ->select('cl.*','p.nombres','p.apellidos','p.telefono','p.direccion','p.lnro','p.lnros','p.nro_documento')
            ->where('cl.idcliente','=',$id)
            ->first();

        return view('cliente/show')->with('datos',$datos);
    }

}
