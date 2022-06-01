@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="col-md-8">
		<div class="col-md-8">
			<h1 style="font-family: algeria; color: white;">Lista de Productos
				<a  href="{{route('productos.create')}}" class="btn btn-success">
					<img src="https://cdn-icons-png.flaticon.com/512/359/359858.png" width="20px;" > Nuevo Producto
				</a>
			</h1>
                    <table  class="table  table-bordered table-condensed table-hover">
                        <thead>
                            <th style="text-align:center; color: white;">#</th>
                            <th style="text-align:center; color: white;">Nombre</th>
                            <th style="text-align:center; color: white;">Descripcion</th>
                            <th style="text-align:center; color: white;">Proveedor</th>
                            <th style="text-align:center; color: white;">Acciones</th>
                        </thead>
                        <tbody>
                        	@foreach($productos as $pro)
                        		<tr>
                        			<td style="text-align:center; color:white;">{{$loop->iteration}}</td>
                        			<td style="text-align:center; color:white;">{{$pro->pro_nombre}}</td>
                        			<td style="text-align:center; color:white;">{{$pro->pro_descripcion}}</td>
                                    <td style="text-align:center; color:white;">{{$pro->prov_nombre}}</td>
                                    <td style="text-align:center; color:white;">
                                      <div class="row" style="margin-left:3.5%;">
                                            <a href="{{route('productos.edit',$pro->pro_id)}}" class="btn btn-primary btn-sm" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{route('productos.destroy',$pro->pro_id)}}" method="POST" onsubmit="return confirm('Deseas Eliminar')" style="margin-left:5px;">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                      </div>
                                    </td>
                        		</tr>
                        		@endforeach
                        </tbody>
                        <tfoot>
                            <th style="text-align:center; color:white;">#</th>
                            <th style="text-align:center; color:white;">Nombre</th>
                            <th style="text-align:center; color:white;">Descripcion</th>
                            <th style="text-align:center; color: white;">Proveedor</th>
                            <th style="text-align:center; color:white;">Acciones</th>
                          </tfoot>
                    </table>
        </div>
	</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('Agregado') == 'Si')
        <script>
          Swal.fire(
                        'Producto Agregado Correctamente',
                        ' ',
                        'success'
                      )
        </script>
     @elseif(session('Actualizado') == 'Si')
   <script>
      Swal.fire(
                    'Producto Actualizado Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @elseif(session('Eliminado') == 'Si')
    <script>
      Swal.fire(
                    'Producto Eliminado Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @endif
@endsection