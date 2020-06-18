<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;

use DentalS\Informacion;

class InforController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $infor= Informacion::all();
       return view('informacion.index', compact('infor'));
    
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informes= new Informacion();

         if($request->hasFile('perfil')){
        $file = $request->file('perfil');
        $ima = time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenes/', $ima);
          # code...
      }
        $informes->nombre= $request->input('nombre');
        $informes->decri= $request->input('decri');
        $informes->perfil= $ima;
        $informes->save();
        return redirect()->route('informacion.index');
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
