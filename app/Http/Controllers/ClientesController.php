<?php

namespace App\Http\Controllers;
use App\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index()
    {
         $clientes=Clientes::all();
        return view('clientes.index')
        ->with('clientes',$clientes) ;
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        Clientes::create($data);
        return redirect(route('clientes'))->with('Agregado','Si');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $clientes=Clientes::find($id);
        return view('clientes.edit')
        ->with('clientes',$clientes);
    }

    public function update(Request $request, $id)
    {
         $Cli=Clientes::find($id);
        $Cli->update($request->all());
        return redirect(route('clientes'))->with('Actualizado','Si');
    }

    public function destroy($id)
    {
          Clientes::destroy($id);
        return redirect(route('clientes'))->with('Eliminado','Si');
    }
}