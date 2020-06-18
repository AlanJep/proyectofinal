<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DentalS\instru;
use DentalS\Tproducto;
class InstruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vinstrum= tproducto::all();
        
        return view('producto.instrumento.index', compact('vinstrum'));
         //return view('instrumento.show', compact('cpins','inst'));
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.instrumento.create');
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


       
        $vinstr= new Tproducto();
        $vinstr->nombre= $request->input('nombre');
        $vinstr->descri= $request->input('descri');
        $vinstr->perfil= $ima;
        $vinstr->cantidad= $request->input('cantidad');
        $vinstr->preciotp= $request->input('preciotp');
        $vinstr->preciocu= $request->input('preciocu');
        $vinstr->preciovu= $request->input('preciovu');
        $vinstr->save();

        $vinstru= new instru();
        $vinstru->material= $request->input('material');
        $vinstru->save();
         
        $vinstr->instrus()->attach($vinstru);
        
        });
        return redirect()->route('instrumento.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
       
        $inst = instru_tproducto::where('instru_id','=',$id)->firstOrFail();
        $cpins= Tproducto::where('instru_id','=',$id)->firstOrFail();

        return view('instrumento.show', compact('cpins','inst'));
    
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
