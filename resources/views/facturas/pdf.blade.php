<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="w-75 " style="float: left;">
                <h1 style="font-size: 25pt;">FACTURA</h1>
                    @foreach($compania as $cop)
                    <h5 style="font-size: 8pt;">Ruc: {{$cop->comp_ruc}}</h5>
                    <h5 style="font-size: 8pt;">Direccion:{{$cop->comp_direccion}}</h5>
                    <h5 style="font-size: 8pt;">Telefono: {{$cop->comp_telefono}} </h5>
                    <h5 style="font-size: 8pt;">Email: {{$cop->comp_email}}</h5>
                    @endforeach
            </div>
            <br>
            <div class="w-25 bg-info" style="float: left;border-radius: 15px;" >
                <h5 style="text-align:center;margin-top:5%;font-size:8pt;margin-bottom: -12px">FACTURA {{$factura->fac_no}}</h5>
                <hr  style="background: black;">
                <h5 style="text-align:center;font-size: 8pt;margin-top: -12px;">Fecha: {{$factura->fac_fecha}}</h5>
            </div>  
        </div>

        <div class="container">
            <div class="row">
                <h4 style=" font-size: 10pt;padding-right: -50px;">DATOS DEL CLIENTE</h4>
                <h5 style="font-size: 8pt;">Nombre: {{$factura->cli_nombre}} {{$factura->cli_apellido}}</h5>
                <h5 style="font-size: 8pt;">Direccion: {{$factura->cli_direccion}}</h5>
                <h5 style="font-size: 8pt;">Telefono: {{$factura->cli_telefono}}</h5>
                <h5 style="font-size: 8pt;">Email: {{$factura->cli_email}}</h5>
            </div>
        </div>
        <br>
        <div class="container">
            <div  class="bg-info" style="text-align:center; font-family:Avero y Sangre; font-size:12pt">Detalle Factura</div>
            <table class="table table-sm  table-bordered table-condensed table-hover" style="width:100%; margin-top:2%;">
                <tr>
                    <th style="text-align:center; font-family:Avero y Sangre; font-size:11pt">#</th>
                    <th style="text-align:center; font-family:Avero y Sangre; font-size:11pt">Cantidad</th>
                    <th style="text-align:center; font-family:Avero y Sangre; font-size:11pt">Producto</th>
                    <th style="text-align:right; font-family:Avero y Sangre; font-size:11pt">Vu</th>
                    <th style="text-align:right; font-family:Avero y Sangre; font-size:11pt">VT</th>
                </tr>
                <?php 
                    $subt=0;
                ?>
                @foreach($detalle as $d)
                <?php $subt+=$d->fact_vt?>
                <tr>
                    <td style="text-align:center; font-family:Avero y Sangre; font-size:10pt">{{$loop->iteration}}</td>
                    <td style="text-align:center; font-family:Avero y Sangre; font-size:10pt">{{$d->fact_cantidad}}</td>
                    <td style="text-align:center; font-family:Avero y Sangre; font-size:10pt">{{$d->pro_nombre}}</td>
                    <td style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{ number_format($d->fact_vu,2)}}$</td>
                    <td style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{ number_format($d->fact_vt,2)}}$</td>
                </tr>
                @endforeach
                <?php
                    $desc=0.05*$subt;
                    $fva=$subt*0.12;
                    $vt=($subt-$desc)+$fva;
                ?>
                <tr>
                    <td colspan="3" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">Subt:</td>
                    <td  colspan="2" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{number_format($subt,2)}}$</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">Desc:</td>
                    <td  colspan="2" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{number_format($desc,2)}}$</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">IVA:</td>
                    <td  colspan="2" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{number_format($fva,2)}}$</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">Total:</td>
                    <td colspan="2" style="text-align:right; font-family:Avero y Sangre; font-size:10pt">{{number_format($vt,2)}}$</td>
                </tr>
            </table>
        </div>
    </body>
    </html>