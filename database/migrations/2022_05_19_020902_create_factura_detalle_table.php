<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalle', function (Blueprint $table) {
            $table->id('fact_id');
            $table->foreignid('fac_id')->references('fac_id')->on('factura');
            $table->foreignid('pro_id')->references('pro_id')->on('productos');
            $table->integer('fact_cantidad');
            $table->float('fact_vu');
            $table->float('fact_vt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_detalle');
    }
}
