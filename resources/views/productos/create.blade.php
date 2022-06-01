@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class=" col-md-8">
		<div class="col-md-8" >
			<h1 style="font-family: Acero y Sangre;  padding-left: 2%; color: white;">Registro de Productos</h1>
            <form  action="{{route('productos.store')}}" method="POST">
            	@csrf
                     <div class="form-group col-md-8">
                        <label style="color: white;">Proveedor:</label>
                        <select required name="prov_id" id="prov_id" class="form-control">
                        <option value="">-Elija un Proveedor-</option>
                           @foreach($proveedor as $prov)
                                 <option selected value="{{$prov->prov_id}}">{{$prov->prov_nombre}}</option>
                           @endforeach
                        </select>
                     </div>

                     <div class="form-group col-md-8">
                      	<label style="color: white;">Nombre:</label>
                      	<input type="text" class="form-control" name="pro_nombre" id="pro_nombre" maxlength="50" placeholder="Escriba el Nombre" required>
                     </div>

                    <div class="form-group col-md-8">
                      	<label style="color: white;">Descripcion:</label>
                      	<input type="text" class="form-control" name="pro_descripcion" id="pro_descripcion" maxlength="100" placeholder="Escriba la Descripcion" required>
                     </div>

                    <button class="btn btn-primary" style="margin-left:2%;"><i class="bi bi-device-ssd-fill"></i> Guardar</button>
            </form>
            <div class="row"  style="margin-left:25%; margin-top: -37px;">
                 <a href="{{route('productos')}}" >
                           <button class="btn btn-danger"><i class="bi bi-caret-left-square-fill"></i>  Cancelar</button>
                    </a>
            </div>
		</div>
	</div>
</div>
@endsection