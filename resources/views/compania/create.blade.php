@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class=" col-md-8">
		<div class="col-md-8" >
			<h1 style="font-family: Acero y Sangre;  padding-left: 2%; color: white;">Registro de Compania</h1>
            <form  action="{{route('compania.store')}}" method="POST">
            	@csrf
                     <div class="form-group col-md-8">
                      	<label style="color: white;">Direccion:</label>
                      	<input type="text" class="form-control" name="comp_direccion" id="comp_direccion" maxlength="50" placeholder="Escriba su Direccion" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Telefono:</label>
                      	<input type="text" class="form-control" name="comp_telefono" id="comp_telefono" maxlength="10" placeholder="Escriba su Telefono" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Email:</label>
                      	<input type="email" class="form-control" name="comp_email" id="comp_email" maxlength="80" placeholder="Escriba su Email" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Ruc:</label>
                      	<input type="text" class="form-control" name="comp_ruc" id="comp_ruc" maxlength="13" placeholder="Escriba su Ruc" required>
                     </div>
                    <button class="btn btn-primary" style="margin-left:2%;"><i class="bi bi-device-ssd-fill"></i> Guardar</button>
            </form>
            <div class="row"  style="margin-left:15%; margin-top: -37px;">
                 <a href="{{route('compania')}}" >
                           <button class="btn btn-danger"><i class="bi bi-caret-left-square-fill"></i>  Cancelar</button>
                    </a>
            </div>
		</div>
	</div>
</div>
@endsection