@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="col-md-8">
		<div class="col-md-8">
			<h1 style="font-family: algeria; color: white;">Datos de la compania
				<a href="{{route('compania.create')}}" class="btn btn-success">
					<img src="https://cdn-icons-png.flaticon.com/512/359/359858.png" width="20px;" > Agregar Compania
				</a>
			</h1>
                    <table  class="table  table-bordered table-condensed table-hover">
                        <thead>
                            <th style="text-align:center; color: white;">#</th>
                            <th style="text-align:center; color: white; width: 50%;">Direccion</th>
                            <th style="text-align:center; color: white;">Telefono</th>
                            <th style="text-align:center; color: white;">Email</th>
                            <th style="text-align:center; color: white;">Ruc</th>
                            <th style="text-align:center; color: white;">Acciones</th>
                        </thead>
                        <tbody>
                        	@foreach($compania as $comp)
                        		<tr>
                        			<td style="text-align:center; color:white;">{{$loop->iteration}}</td>
                        			<td style="text-align:center; color:white;">{{$comp->comp_direccion}}</td>
                        			<td style="text-align:center; color:white;">{{$comp->comp_telefono}}</td>
                                    <td style="text-align:center; color:white;">{{$comp->comp_email}}</td>
                        			<td style="text-align:center; color:white;">{{$comp->comp_ruc}}</td>
                                    <td style="text-align:center; color:white;">
                                      <div class="row" style="margin-left:30%;">
                                                <form action="{{route('compania.destroy',$comp->comp_id)}}" method="POST" onsubmit="return confirm('Deseas Eliminar')" style="margin-left:2px;">
                                                @csrf
                                                <button class="btn btn-danger btn-sm formulario-eliminaru" title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                                            </form> 
                                      </div>
                                    </td>
                        		</tr>
                        		@endforeach
                        </tbody>
                        <tfoot>
                            <th style="text-align:center; color: white;">#</th>
                            <th  style="text-align:center; color: white;">Direccion</th>
                            <th style="text-align:center; color: white;">Telefono</th>
                            <th style="text-align:center; color: white;">Email</th>
                            <th style="text-align:center; color: white;">Ruc</th>
                            <th style="text-align:center; color: white;">Acciones</th>
                          </tfoot>
                    </table>
                </div>
	</div>
</div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('Compania') == 'Si')
        <script>
          Swal.fire(
                        'Compania Agregada Correctamente',
                        ' ',
                        'success'
                      )
        </script>
    @elseif(session('Eliminadoc') == 'Si')
    <script>
      Swal.fire(
                    'Compania Eliminada Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @endif
@endsection