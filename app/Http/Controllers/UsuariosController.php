<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios=User::all();
        return view('usuarios.index')
        ->with('usuarios',$usuarios) ;
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $data['password']=bcrypt($data['password']);
        User::create($data);
        return redirect(route('usuarios'))->with('Agregado','Si');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('usuarios'))->with('Eliminado','Si');
    }
}