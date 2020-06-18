<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DentalS\Categoria;

use DentalS\Http\Requests;
use DentalS\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
// use DentalS\Http\Controllers\Session
use DB;

class CategoriController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('categoria.index');        
    }

    public function data(Datatables $datatables){
        // $query=Categoria::all();
        $query=Categoria::orderBy('nombre','asc')->get();
        return $datatables->collection($query)
            ->make(true);
            // ->addColumn('nro', 0)
    }

    public function create(){
      return view('categoria.create');
    }

    public function store(CategoriaFormRequest $request){
        $categoria= new Categoria();
        $categoria->nombre= $request->get('categoria');
        $categoria->descri= $request->get('descripcion');
        $categoria->save();
        $notificacion= array('message' =>'Categoria guardada' , 'alert-type'=>'info');
        return Redirect::to('categoria')->with($notificacion);
    }

    public function show( $nombre){
      $cate = Categoria::where('nombre','=',$nombre)->firstOrFail(); 
      return view('categoria.show', compact('cate'));
    }

    public function edit($id){
        return view("categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

     public function update(CategoriaFormRequest $request,$id){
        $categoria=Categoria::findOrFail($id);

        $categoria->nombre=$request->get('categoria');
        $categoria->descri=$request->get('descripcion');

        $categoria->update();
        $notificacion= array('message' =>'Categoria actualizada' , 'alert-type'=>'success');
        return Redirect::to('categoria')->with($notificacion);
      }

    public function destroy($nombre)
    {
     $cdes = Categoria::where('nombre','=',$nombre)->firstOrFail();
        $eliminarf = public_path().'/imagenes/'.$cdes->perfil;
        \File::delete($eliminarf);
         $cdes->delete();
         return redirect()->route('categoria.index');
    }
    public function estado($id){
        $categoria=Categoria::FindOrFail($id);
        if($categoria->estado=="Activo"){
            $estado="Inactivo";
        }else{
            $estado="Activo";
        }
        $categoria->estado=$estado;
        $categoria->update();
        
        $notificacion= array('message' =>'Se cambio el estado de la categoria a '.$categoria->estado , 'alert-type'=>'info');
        return Redirect::to('categoria')->with($notificacion);
    }
}
