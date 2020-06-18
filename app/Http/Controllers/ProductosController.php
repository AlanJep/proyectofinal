<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DentalS\producto;
use DentalS\Categoria;
use DentalS\Material;
use Response;
use Illuminate\Support\Facades\Input;


use DentalS\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use DB;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       return View('producto.index');        
    }

    public function data(Datatables $datatables){
        $query=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->select('p.id as pid','p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria')
            ->orderBy('p.nombre','asc')
            ->get();

        return $datatables->collection($query)
            ->make(true);
    }

    public function create(){
      $material=Material::all();
      $categorias=DB::table('categorias')
            ->where('estado','=','Activo')
            ->get();
      return view("producto.create",["categorias"=>$categorias,"material"=>$material]);
    }

    public function store(ProductoFormRequest $request){
        $producto= new Producto();
        $producto->nombre= $request->get('producto');
        // $producto->precio= $request->get('precio');
        $producto->precio= 0;
        $producto->material_id= $request->get('amaterial');
        // $producto->stock= $request->get('stock');
        $producto->stock= 0;
        $producto->descripcion= $request->get('descripcion');
        $producto->categoria_id= $request->get('categoria');
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
        }
        if(!empty($request->get('tipo'))){
            $producto->tipo= $request->get('tipo');
            if(!empty($request->get('contiene'))){
                $producto->contiene= $request->get('contiene');
            }
        }

        if(!empty($request->get('material'))){
            $producto->material= $request->get('material');
        }

        $producto->save();
        $notificacion= array('message' =>'Producto guardado' , 'alert-type'=>'info');
        return Redirect::to('producto')->with($notificacion);
    }


    public function edit($id){
        $producto=Producto::findOrFail($id);
        $categorias=Categoria::all();
        $material=Material::all();
        // $material=array("Plastico","Hierro inoxidable","Niquelado");
        return view("producto.edit",["producto"=>$producto,"categorias"=>$categorias,"material"=>$material]);
    }

     public function update(ProductoFormRequest $request,$id){
        $producto=Producto::findOrFail($id);
       
        $producto->nombre= $request->get('producto');
        // $producto->precio= $request->get('precio');
        $producto->stock= $request->get('stock');
        $producto->descripcion= $request->get('descripcion');
        if(!empty($request->get('categoria'))){
            $producto->categoria_id= $request->get('categoria');
        }
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
        }
        if(!empty($request->get('tipo'))){
            $producto->tipo= $request->get('tipo');
            if(!empty($request->get('contiene'))){
                $producto->contiene= $request->get('contiene');
            }
            else{
                $producto->contiene=0;
            }
        }
        
        if(!empty($request->get('amaterial'))){
            $producto->material_id= $request->get('amaterial');
        }
        else{
            $producto->material_id=0;
            // $producto->material= "";
        }

        $producto->update();
        $notificacion= array('message' =>'producto actualizado' , 'alert-type'=>'success');
        return Redirect::to('producto')->with($notificacion);
      }

      public function verproducto($id){
        $producto=DB::table('productos as p')
            ->join('categorias as c','p.categoria_id','=','c.id')
            ->select('p.nombre','p.descripcion','p.imagen','p.precio','p.stock','c.nombre as categoria')
            ->where('p.id','=',$id)
            ->first();

        return view('producto/show')->with('producto',$producto);
        }

    public function material(){
        $mat= Input::get('valor');
        $material= new material();
        $material->material= $mat;
        $material->save();

        $tmaterial=Material::all();

        return Response::json($tmaterial);
    }
    public function verprocesos(){
        $idp= Input::get('idp');
        $procesos=DB::table('detalle_ingreso as d')
            ->join('productos as p','d.producto_id','=','p.id')
            ->select('p.nombre','d.cantidadi')
            ->where('d.producto_id','=',$idp)
            ->get();

        return Response::json($procesos);
    }
}
