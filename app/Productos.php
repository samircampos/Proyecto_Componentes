<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    protected $primaryKey='pro_id';

     protected $fillable = [
        'prov_id','pro_nombre','pro_descripcion',
    ];
}