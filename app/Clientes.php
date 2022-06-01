<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    // use Notifiable;
    protected $table='clientes';
    protected $primaryKey='cli_id';

     protected $fillable = [
        'cli_nombre','cli_apellido','cli_telefono','cli_cedula','cli_email','cli_direccion',
    ];
}