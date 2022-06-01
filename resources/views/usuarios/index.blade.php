@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="col-md-8">
		<div class="col-md-8">
			<h1 style="font-family: algeria; color: white;">Lista de Usuarios
				<a href="{{route('usuarios.create')}}" class="btn btn-success">
					<img src="https://cdn-icons-png.flaticon.com/512/359/359858.png" width="20px;" > Nuevo Usuario
				</a>
			</h1>
                    <table  class="table  table-bordered table-condensed table-hover">
                        <thead>
                            <th style="text-align:center; color: white;">#</th>
                            <th style="text-align:center; color: white;">Nombre</th>
                            <th style="text-align:center; color: white;">Apellido</th>
                            <th style="text-align:center; color: white;">Telefono</th>
                            <th style="text-align:center; color: white;">Email</th>
                            <th style="text-align:center; color: white;">Cedula</th>
                            <th style="text-align:center; color: white;">Acciones</th>
                        </thead>
                        <tbody>
                        	@foreach($usuarios as $u)
                        		<tr>
                        			<td style="text-align:center; color:white;">{{$loop->iteration}}</td>
                        			<td style="text-align:center; color:white;">{{$u->usu_nombre}}</td>
                        			<td style="text-align:center; color:white;">{{$u->usu_apellido}}</td>
                                    <td style="text-align:center; color:white;">{{$u->usu_telefono}}</td>
                        			<td style="text-align:center; color:white;">{{$u->email}}</td>
                        			<td style="text-align:center; color:white;">{{$u->usu_cedula}}</td>
                                    <td style="text-align:center; color:white;">
                                      <div class="row" style="margin-left:30%;">
                                            <form action="{{route('usuarios.destroy',$u->usu_id)}}" method="POST" onsubmit="return confirm('Deseas Eliminar')" style="margin-left:2px;">
                                                @csrf
                                                <button class="btn btn-danger btn-sm formulario-eliminaru" title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                      </div>
                                    </td>
                        		</tr>
                        		@endforeach
                        </tbody>
                        <tfoot>
                            <th style="text-align:center; color:white;">#</th>
                            <th style="text-align:center; color:white;">Nombre</th>
                            <th style="text-align:center; color:white;">Apellido</th>
                            <th style="text-align:center; color: white;">Telefono</th>
                            <th style="text-align:center; color:white;">Email</th>
                            <th style="text-align:center; color:white;">Cedula</th>
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
                        'Usuario Agregado Correctamente',
                        ' ',
                        'success'
                      )
        </script>
     @elseif(session('Actualizado') == 'Si')
   <script>
      Swal.fire(
                    'Usuario Actualizado Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @elseif(session('Eliminado') == 'Si')
    <script>
      Swal.fire(
                    'Usuario Eliminado Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @endif
@endsection