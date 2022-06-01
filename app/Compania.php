<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    // use Notifiable;
    protected $table='compania';
    protected $primaryKey='comp_id';

     protected $fillable = [
        'comp_direccion','comp_telefono','comp_email','comp_ruc',
    ];
}
