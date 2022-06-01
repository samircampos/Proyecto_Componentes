<?php

namespace App\Http\Controllers;
use App\Productos;
use App\Proveedor;
use DB;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos=DB::select("SELECT * FROM productos p JOIN proveedor pr ON p.prov_id=pr.prov_id");
        return view('productos.index')->with('productos',$productos);
    }
    /**
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor=Proveedor::all();
        return view('productos.create')->with('proveedor',$proveedor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Productos::create($data);
        return redirect(route('productos'))->with('Agregado','Si');
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
         $productos=Productos::find($id);
        return view('productos.edit')
        ->with('productos',$productos);
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
        $Pro=Productos::find($id);
        $Pro->update($request->all());
        return redirect(route('productos'))->with('Actualizado','Si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Productos::destroy($id);
        return redirect(route('productos'))->with('Eliminado','Si');
    }
}