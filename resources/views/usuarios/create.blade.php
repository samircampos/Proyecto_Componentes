@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class=" col-md-8">
		<div class="col-md-8" >
			<h1 style="font-family: Acero y Sangre;  padding-left: 2%; color: white;">Registro de Usuarios</h1>
            <form  action="{{route('usuarios.store')}}" method="POST">
            	@csrf
                     <div class="form-group col-md-8">
                      	<label style="color: white;">Nombre:</label>
                      	<input type="text" class="form-control" name="usu_nombre" id="usu_nombre" maxlength="50" placeholder="Escriba su Nombre" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Apellido:</label>
                      	<input type="text" class="form-control" name="usu_apellido" id="usu_apellido" maxlength="50" placeholder="Escriba su Apellido" required>
                     </div>


                    <div class="form-group col-md-8">
                        <label style="color: white;">Telefono:</label>
                        <input type="number" class="form-control" name="usu_telefono" id="usu_telefono" maxlength="10" placeholder="Escriba su Telefono" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Email:</label>
                      	<input type="email" class="form-control" name="email" id="email" maxlength="80" placeholder="Escriba su Email" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Cedula:</label>
                      	<input type="number" class="form-control" name="usu_cedula" id="usu_cedula" maxlength="10" placeholder="Escriba su Cedula" required>
                     </div>

                     <div class="form-group col-md-8">
                      	<label style="color: white;">Contraseña:</label>
                      	<input type="password" class="form-control" name="password" id="password"  placeholder="Escriba su Contraseña" required>
                     </div>
                    <button class="btn btn-primary" style="margin-left:2%;"><i class="bi bi-device-ssd-fill"></i> Guardar</button>
            </form>
            <div class="row"  style="margin-left:15%; margin-top: -37px;">
                 <a href="{{route('usuarios')}}" >
                           <button class="btn btn-danger"><i class="bi bi-caret-left-square-fill"></i>  Cancelar</button>
                    </a>
            </div>
		</div>
	</div>
</div>
@endsection