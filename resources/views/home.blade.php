@extends('layouts.app')
@section('content')
<style>
    img{
        filter: opacity(0.9) drop-shadow(0 0 0 red);
    }
</style>
<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-md-6" style="float:left">
            <h3 style="font-family:algeria; text-align: center; color: white;">MIS DATOS</h3>
                <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="width:20%;margin-left: 40%;">
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Nombre y Apellido:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{ Auth::user()->usu_nombre}} {{ Auth::user()->usu_apellido}}</h4>
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Email:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{ Auth::user()->email}}</h4>
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Cedula:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{ Auth::user()->usu_cedula}}</h4>
            <hr  style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color:white; font-size: 15pt;">Telefono:</h3>
            <h4 style="font-family:algeria; text-align: center; color:white; font-size: 15pt;">{{ Auth::user()->usu_telefono}}</h4>
        </div>
        <div class="col-md-6" style="float:left;">
            <h3 style="font-family:algeria; text-align: center; color: white;">DATOS EMPRESARIALES</h3>
            <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="width:20%;margin-left: 40%;">
            @foreach($compania as $comp)
            <hr  style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color:white; font-size: 15pt;">Ruc:</h3>
            <h4 style="font-family:algeria; text-align: center; color:white; font-size: 15pt;">{{$comp->comp_ruc}}</h4>
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Direccion:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{$comp->comp_direccion}}</h4>
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Telefono:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{$comp->comp_telefono}}</h4>
            <hr style="background: white;">
            <h3 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">Email:</h3>
            <h4 style="font-family:algeria; text-align: center; color: white; font-size: 15pt;">{{$comp->comp_email}}</h4>
            @endforeach
        </div>
    </div>
</div>
@endsection