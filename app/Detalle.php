<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table='factura_detalle';
    protected $primaryKey='fact_id';
     protected $fillable = [
      'pro_id','fac_id','fact_cantidad','fact_vu','fact_vt',
    ];
}