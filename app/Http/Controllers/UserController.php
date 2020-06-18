<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
// use DentalS\Usuario;
use DentalS\User;
use DentalS\Persona;
use DB;
use Illuminate\Support\Facades\Input;
use Response;

use DentalS\Http\Requests;
use DentalS\Http\Requests\UserFormRequest;
use DentalS\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('usuario.index');        
    }

    public function data(Datatables $datatables){
        // $query=User::all();
        $query=User::orderBy('name','asc')->get();
        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      return view('usuario.create');
    }

    public function store(UserFormRequest $request){
        $persona= new Persona();
        $persona->nombres= $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->telefono= $request->get('telefono');
        $persona->direccion= $request->get('direccion');
        $persona->lnro= $request->get('nrol');
        $persona->lnros= $request->get('lnros');
        $persona->nro_documento= $request->get('nro');
        $persona->save();

        $usuario= new User();
        $usuario->name= $request->get('usuario');
        $usuario->email= $request->get('email');
        $usuario->password= Hash::make($request->get('password'));
        $usuario->rol= $request->get('rol');
        $usuario->estado= "Activo";
        $usuario->persona_id= $persona->idpersona;
        $usuario->save();
        $notificacion= array('message' =>'Usuario guardado' , 'alert-type'=>'info');
        return Redirect::to('usuario')->with($notificacion);
    }

    public function show($nombre){
      $cate = Categoria::where('nombre','=',$nombre)->firstOrFail(); 
      return view('categoria.show', compact('cate'));
    }

    public function edit($id){
        $usuario=User::findOrFail($id);
        $persona=Persona::findOrFail($usuario->persona_id);
        return view("usuario.edit",["usuario"=>$usuario,"persona"=>$persona]);
    }

     public function update(Request $request,$id){
        $usuario=User::findOrFail($id);
        $data=request()->validate([
            'usuario'=>'required',
            'password'=>'required',
            'email'=>['required',Rule::unique('users')->ignore($usuario->id)]
        ]);
        // if($usuario->email!=$request->get('email')){
            $usuario->email= $data['email'];
        // }
        $usuario->name= $data['usuario'];
        $usuario->password= Hash::make($data['password']);
        $usuario->rol= $request->get('rol');
        $usuario->update();

        $persona=Persona::findOrFail($usuario->persona_id);
        $persona->nombres= $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->telefono= $request->get('telefono');
        $persona->direccion= $request->get('direccion');
        $persona->lnro= $request->get('nrol');
        $persona->lnros= $request->get('lnros');
        $persona->nro_documento= $request->get('nro');
        $persona->update();

        $notificacion= array('message' =>'Usuario actualizado' , 'alert-type'=>'success');
        return Redirect::to('usuario')->with($notificacion);
      }

    public function estado($id){
        $usuario=User::FindOrFail($id);
        if($usuario->estado=="Activo"){
            $estado="Inactivo";
        }else{
            $estado="Activo";
        }
        $usuario->estado=$estado;
        $usuario->update();
        
        $notificacion= array('message' =>'Se cambio el estado del usuario '.$usuario->name.' a '.$usuario->estado , 'alert-type'=>'info');
        return Redirect::to('usuario')->with($notificacion);
    }
    public function verusuario($id){
        $datos=DB::table('users as u')
            ->join('persona as p','u.persona_id','=','p.idpersona')
            ->select('u.*','p.nombres','p.apellidos','p.telefono','p.direccion','p.lnro','p.lnros','p.nro_documento')
            ->where('u.id','=',$id)
            ->first();

        return view('usuario/show')->with('datos',$datos);
    }
    public function editarUsuario(){
        $id= Input::get('id');
        $contra= Input::get('contra');

        $usuario=User::FindOrFail($id);

        // (texto, cifrd)
        if(Hash::check($contra, $usuario->password)){
            $exi="si";    
        }else{
            $exi="no";
        }
        return Response::json($exi);
    }
}
