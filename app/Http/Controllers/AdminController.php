<?php

namespace DentalS\Http\Controllers;

use Illuminate\Http\Request;
use DentalS\User;
use DentalS\Role;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $vu= User::all();
        return view('usuario.admin.index', compact('vu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData=$request->validate([
            'name'=>'required|max:10',
            'email'=>'required|max:15',
            'password'=>'required'

        ]);


        $vsotreu= new User();
        
        $vsotreu->name= $request->input('name');
        $vsotreu->email= $request->input('email');
        $vsotreu->password= $request->input('password');
        $vsotreu->save();

        return redirect()->route('usuario.admin.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $vshowu = User::where('name','=',$name)->firstOrFail(); 
      return view('usuario.admin.show', compact('vshowu'));
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
