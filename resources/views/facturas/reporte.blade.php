<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<h1>Reporte Facturas</h1>
<table class="table-red table-striped table">
    <thead style="color:red">


            
        <th style="text-align:center;">#</th>
        <th style="text-align:center;">No.</th>
        <th style="text-align:center;">Fecha</th>
        <th style="text-align:center;">Cliente</th>
        <th style="text-align:center;">Cantidad</th>
    
        <th style="text-align:center;">Total</th>


      
    </thead>
<?php 
$subt=0;
$x=1;
 ?>
        
@foreach($facturas as $fac)

@if($fac->fac_estado==1)

<?php 
$subt+=$fac->fact_vt

?>
   <tbody>
            
                <td style="text-align:center;">{{{$x++}}}</td>

                <td style="text-align:center;">{{$fac->fac_no}}</td>

                <td style="text-align:center;">{{$fac->fac_fecha}}</td>

                <td style="text-align:center;">{{$fac->cli_nombre}}</td>
                
                <td style="text-align:center;">{{$fac->fact_cantidad}}</td>

                <td style="text-align:center;">{{number_format($fac->fact_vt),2}}</td>


                </tbody>

@endif
     


                

</div>

</td>
        
    @endforeach


<tr>
    <td colspan="3" style="text-align: right,"><b>Totales</b></td>

    <td style="text-emphasis: center;">{{number_format($subt,2)}}</td>



</tr>


</table>



</h1>

