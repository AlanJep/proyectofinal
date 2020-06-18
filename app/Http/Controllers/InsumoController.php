<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DentalS\Insumo;
use DentalS\Tproducto;
class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vin= Insumo::all();
        return view('producto.insumo.index', compact('vin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('producto.insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function ()  use ($request)  
        {
             if($request->hasFile('perfil')){
        $file = $request->file('perfil');
        $ima = time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenes/', $ima);
          # code...
      }
        


        $vinsu= new Tproducto();
        $vinsu->nombre= $request->input('nombre');
        $vinsu->descri= $request->input('descri');
        $vinsu->perfil= $ima;
        $vinsu->cantidad= $request->input('cantidad');
        $vinsu->preciotp= $request->input('preciotp');
        $vinsu->preciocu= $request->input('preciocu');
        $vinsu->preciovu= $request->input('preciovu');
        $vinsu->save();

        $vinso= new Insumo();
        $vinso->contieneu= $request->input('contieneu');
        $vinso->preciovcu= $request->input('preciovcu');
        $vinso->fvin= $request->input('fvin');
        $vinso->save();
         
        $vinsu->insumos()->attach($vinso);
        

        });
        
        return redirect()->route('producto.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
