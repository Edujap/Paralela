<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{


    public function __construct(){
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
       {
           $articulos = Articulo::all();
           return view('articulo.index')->with('articulos',$articulos);
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo= new Articulo();
        $articulo->codigo =$request->get('codigo');
        $articulo->cantidad =$request->get('cantidad');
        $articulo->precio =$request->get('precio');
        $articulo->descripcion =$request->get('descripcion');
        $articulo->save();
        return redirect('/articulo');

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
        $articulo=Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
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
        $articulo= Articulo::find($id);
        $articulo->codigo =$request->get('codigo');
        $articulo->cantidad =$request->get('cantidad');
        $articulo->precio =$request->get('precio');
        $articulo->descripcion =$request->get('descripcion');
        $articulo->save();
        return redirect('/articulo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo= Articulo::find($id);
        $articulo->delete();
        return redirect('/articulo');
    }
}
