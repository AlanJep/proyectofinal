<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DentalS\medica;
use DentalS\Tproducto;
class MedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $vmedi= medica::all();
        return view('producto.medicamento.index', compact('vmedi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.medicamento.create');
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


        $vme= new Tproducto(); 
        $vme->nombre= $request->input('nombre');
        $vme->descri= $request->input('descri');
        $vme->perfil= $ima;
        $vme->cantidad= $request->input('cantidad');
        $vme->preciotp= $request->input('preciotp');
        $vme->preciocu= $request->input('preciocu');
        $vme->preciovu= $request->input('preciovu');
        $vme->save();

        $vime= new medica();
        $vime->fvme= $request->input('fvme');
        $vime->save();
         
        $vme->medicas()->attach($vime);
        
        });
        return redirect()->route('medicamento.index');
      
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
