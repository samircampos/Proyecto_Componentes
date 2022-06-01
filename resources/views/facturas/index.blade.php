@extends('layouts.app')
@section('content')
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="col-md-8">
				<h1 style="font-family:Acero y Sangre; color:white;"> Facturas
					<a href="{{route('facturas.create')}}" class="btn btn-success">
					<img src="https://cdn-icons-png.flaticon.com/512/359/359858.png" width="20px;" > Nueva Factura
				</a>
				</h1>
                <div class="row">
                    <form action="{{route('facturas.search')}}" method="POST">
                    @csrf
                        Desde:<input type="date" name="desde" value="{{$desde}}">
                        Hasta:<input type="date" name="hasta" value="{{$hasta}}">
                        <button class="btn btn-success" value="btn_buscar" name="btn_buscar">Buscar</button>
                        <button class="btn btn-danger" value="btn_pdf" name="btn_pdf">Reporte</button>
                    </form>
                </div>
				   <table  class="table  table-bordered table-condensed table-hover" style="margin-top:2%;">
                        <thead>
                            <th style="text-align:center; color: white;">#</th>
                            <th style="text-align:center; color: white;">Factura</th>
                            <th style="text-align:center; color: white;">Fecha</th>
                            <th style="text-align:center; color: white;">Cliente</th>
                            <th style="text-align:center; color: white;">Estado</th>
                            <th style="text-align:center; color: white;">Acciones</th>
                        </thead>
                        <tbody>
                        	@foreach($facturas as $f)
                        		<tr>
                        			<td style="text-align:center; color:white;">{{$loop->iteration}}</td>
                        			<td style="text-align:center; color:white;">{{$f->fac_no}}</td>
                        			<td style="text-align:center; color:white;">{{$f->fac_fecha}}</td>
                                    <td style="text-align:center; color:white;" width="200px">{{$f->cli_nombre}} {{$f->cli_apellido}}</td>
                                    @if($f->fac_estado == 1)
                                        <td style="color:white;">ACEPTADA</td>
                                        <td width="800px">
                                            <div class="row" style="margin-left:1%;">
                                            <a href="{{route('facturas.pdf',$f->fac_id)}}" class="btn btn-danger btn-sm" title="PDF" target="_blank" style="margin-left:2%;"><i class="bi bi-file-earmark-pdf"></i></a>
                                            <a href="{{route('facturas.edit',$f->fac_id)}}" class="btn btn-primary btn-sm" title="Editar" style="margin-left:2%;"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{route('facturas.anular',$f->fac_id)}}" class="btn btn-danger btn-sm" title="Eliminar" style="margin-left:2%;"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    @else
                                        <td style="color:white;">ANULADA</td>
                                        <td>
                                            <a href="{{route('facturas.pdf',$f->fac_id)}}" class="btn btn-danger btn-sm" title="PDF" target="_blank" style="margin-left:2%;"><i class="bi bi-file-earmark-pdf"></i></a>
                                        </td>

                                    @endif
                                </tr>
                        		</tr>
                        		@endforeach
                        </tbody>
                        <tfoot>
                            <th style="text-align:center; color:white;">#</th>
                            <th style="text-align:center; color:white;">Factura</th>
                            <th style="text-align:center; color:white;">Fecha</th>
                            <th style="text-align:center; color: white;">Cliente</th>
                            <th style="text-align:center; color: white;">Estado</th>
                            <th style="text-align:center; color:white;">Acciones</th>


                          </tfoot>
                    </table>
			</div>
		</div>
	</div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('A') == 'a')
        <script>
          Swal.fire(
                        'Factura  Anulada Correctamente',
                        ' ',
                        'success'
                      )
        </script>
    @endif
@endsection