@extends('layouts.app')
@section('content')
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h2 style="color:white; font-family: Acero y Sangre;">Formulario de Facturas</h2>
			</div>
			<div class="col-md-6">
<?php
if(isset($facturas)){
	$fac_id=$facturas->fac_id;
	$cli_id=$facturas->cli_id;
	$fac_no=$facturas->fac_no;
	$fac_fecha=$facturas->fac_fecha;
	$fac_descuento=$facturas->fac_descuento;
	$fac_iva=$facturas->fac_iva;
	$fac_total=$facturas->fac_total;
	$fac_observaciones=$facturas->fac_observaciones;
}else{
	$fac_id="";
	$cli_id="";
	$fac_no="";
	$fac_fecha=date('Y-m-d');
	$fac_descuento=0;
	$fac_iva=0;
	$fac_total=0;
	$fac_observaciones="";
}
?>
				<form action="{{route('facturas.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6" style="margin-left">
							<label for="cli_id" style="color:white;">Cliente</label>
							<select required name="cli_id" id="cli_id" class="form-control">
								<option value="">-Elija un cliente-</option>
								@foreach($clientes as $c)
									@if($c->cli_id ==$cli_id)
										<option selected value="{{$c->cli_id}}">{{$c->cli_nombre}}  {{$c->cli_apellido}}</option>
									@else
										<option value="{{$c->cli_id}}">{{$c->cli_nombre}}  {{$c->cli_apellido}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="fac_no" style="color:white;">N° Factura</label>
							<input type="number" required  value="{{$fac_no}}" id="fac_no" name="fac_no" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="fac_fecha" style="color:white;">Fecha</label>
							<input type="date" required  value="{{$fac_fecha}}"  id="fac_fecha" name="fac_fecha" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<label for="fac_descuento" style="color:white;">Descuento</label>
							<input type="number" required  value="{{$fac_descuento}}" id="fac_descuento" name="fac_descuento" class="form-control">
						</div>

						<div class="col-md-3">
							<label for="fac_iva" style="color:white;">Iva</label>
							<input type="number"  required  value="{{$fac_iva}}" id="fac_iva" name="fac_iva"   class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="fac_total" style="color:white;">Total</label>
							<input type="text" readonly value="{{$fac_total}}"  id="fac_total" name="fac_total"  class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="fac_observaciones" style="color:white;">Observaciones</label>
							<input type="text"  value="{{$fac_observaciones}}" id="fac_observaciones" name="fac_observaciones" class="form-control">
						</div>
					</div>
					<br>
					<div class="row">
						<button class="btn btn-primary " style="margin-left: 2%;"><i class="bi bi-device-ssd-fill"></i> Guardar</button>
					</div>
				</form>
				<div class="row"  style="margin-left:20%; margin-top: -37px;">
                 <a href="{{route('facturas.index')}}" >
                           <button class="btn btn-danger"><i class="bi bi-caret-left-square-fill"></i>  Cancelar</button>
                    </a>
           		 </div>
			</div>
			<div class="col-md-5">
					<form action="{{route('facturas_detalle.detalle')}}" method="post">
						@csrf
						<table class="table  table-bordered table-condensed table-hover">
							<thead>
		                        <th style="text-align:center; color: white;">#</th>
		                        <th style="text-align:center; color: white;">Cantidad</th>
		                        <th style="text-align:center; color: white;">Producto</th>
		                        <th style="text-align:center; color: white;">VUnit</th>
		                        <th style="text-align:center; color: white;">Total</th>
		                        <th style="text-align:center; color: white;">Mas</th>
		                    </thead>
		                    <tbody>
		                    	<td></td>
		                    	<td>
		                    		<input  id="fac_id" name="fac_id" value="{{$fac_id}}" type="hidden">
		                    		<input type="number" name="fact_cantidad" id="fact_cantidad" class="form-control">
		                    	</td>
		                    	 <td>
		                    		<select name="pro_id" id="pro_id" style="width: 180px" class="form-control">
		                    			<option value="">Elija un producto</option>
		                    			@foreach($productos as $p)
		                    				<option value="{{$p->pro_id}}">{{$p->pro_nombre}}</option>
		                    			@endforeach
		                    		</select>
		                    	</td>
		                    	 <td>
		                    		<input type="number" name="fact_vu" id="fact_vu" class="form-control">
		                    	</td>
		                    	<td>
		                    		<input type="text"  readonly name="fact_vt" id="fact_vt" class="form-control">
		                    	</td>
		                    	<td>
		                    		<button class="btn btn-success btn-sm" name="btn_detalle" value="btn_detalle">+</button>
		                    	</td>
		                    </tbody>
		                    @isset($detalle)
		                    <?php 
		                    	$subt=0;
		                    ?>
			                    @foreach($detalle as $dt)
			                    <?php $subt+=$dt->fact_vt?>
			                    	<tr>
			                    		<td style="text-align:center; color: white;">{{$loop->iteration}}</td>
			                    		<td style="text-align:center; color: white;">{{$dt->fact_cantidad}}</td>
			                    		<td style="text-align:center; color: white;">{{$dt->pro_nombre}}</td>
			                    		<td style="text-align:right; color: white;">{{number_format($dt->fact_vu,2)}}$</td>
			                    		<td style="text-align:right; color: white;">{{number_format($dt->fact_vt,2)}}$</td>
			                    		<td>
		                    					<button class="btn btn-danger btn-sm" name="btn_eliminar" value="{{$dt->fact_id}}">X</button>
			                    		</td>
			                    	</tr>
			                    @endforeach
			                    <?php
                    				$desc=$fac_descuento/100*$subt;
                    				$fva=$subt*$fac_iva/100;
                    				$vt=($subt-$desc)+$fva;
                					?>
			                    <tr>
			                    	<td colspan="4" style="text-align:right; color: white;">Subt:</td>
			                    	<td style="text-align:right; color: white;">{{number_format($subt,2)}}$</td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" style="text-align:right; color: white;">Desc:</td>
			                    	<td style="text-align:right; color: white;">{{number_format($desc,2)}}$</td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" style="text-align:right; color: white;">Iva:</td>
			                    	<td style="text-align:right; color: white;">{{number_format($fva,2)}}$</td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" style="text-align:right; color: white;">Total:</td>
			                    	<td style="text-align:right; color: white;">{{number_format($vt,2)}}$</td>
			                    </tr>	
			                    
			                 @endisset
						</table>
				</form>
			</div>
		</div>
				</form>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('SI') == 'Si')
        <script>
          Swal.fire(
                        'Accion Ejecutada Correctamente',
                        ' ',
                        'success'
                      )
        </script>
       </script>
    @elseif(session('E') == 'e')
	   <script>
	      Swal.fire(
	                    'Datos Agregados Correctamente',
	                    ' ',
	                    'success'
	                  )
	    </script>
    @endif

  <script type="text/javascript">
  	window.onload = function(){
  		const obj_cantidad=document.querySelector("#fact_cantidad");
  		const obj_vu=document.querySelector("#fact_vu");
  		obj_cantidad.addEventListener("change",()=>{
  			calculos();
  		});
  		obj_vu.addEventListener("change",()=>{
  			calculos();
  		});
  	}
  	const calculos=()=>{
  		const vc=document.querySelector("#fact_cantidad");
  		const vu=document.querySelector("#fact_vu");
  		const vt=vc.value*vu.value;
  		document.querySelector("#fact_vt").value=vt;
  	}
  </script>
@endsection