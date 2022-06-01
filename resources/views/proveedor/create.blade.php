@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class=" col-md-8">
		<div class="col-md-8" >
			<h1 style="font-family: Acero y Sangre;  padding-left: 2%; color: white;">Registro de Proveedores</h1>
            <form  action="{{route('proveedor.store')}}" method="POST">
            	@csrf
                     <div class="form-group col-md-8">
                      	<label style="color: white;">Nombre:</label>
                      	<input type="text" class="form-control" name="prov_nombre" id="prov_nombre" maxlength="50" placeholder="Escriba el Nombre" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Email:</label>
                      	<input type="email" class="form-control" name="prov_email" id="prov_email" maxlength="100" placeholder="Escriba el Email" required>
                     </div>

                     <div class="form-group col-md-8">
                        <label style="color: white;">Ruc:</label>
                        <input type="text" class="form-control" name="prov_ruc" id="prov_ruc" maxlength="13" placeholder="Escriba el ruc" required>
                     </div>

                    <button class="btn btn-primary" style="margin-left:2%;"><i class="bi bi-device-ssd-fill"></i> Guardar</button>
            </form>
            <div class="row"  style="margin-left:25%; margin-top: -37px;">
                 <a href="{{route('proveedor')}}" >
                           <button class="btn btn-danger"><i class="bi bi-caret-left-square-fill"></i>  Cancelar</button>
                    </a>
            </div>
		</div>
	</div>
</div>
@endsection