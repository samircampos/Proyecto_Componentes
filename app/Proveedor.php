<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';
    protected $primaryKey='prov_id';

    protected $fillable = [
        'prov_nombre','prov_email','prov_ruc',
    ];
}
