<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table='factura';
    protected $primaryKey='fac_id';
     protected $fillable = [
        'cli_id','fac_no','fac_fecha','fac_total','fac_iva','fac_descuento','fac_observaciones','fac_estado',
    ];
}