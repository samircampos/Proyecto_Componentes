<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compania', function (Blueprint $table) {
            $table->id('comp_id');
            $table->string('comp_direccion');
            $table->string('comp_telefono');
            $table->string('comp_email');
            $table->string('comp_ruc');
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
        Schema::dropIfExists('compania');
    }
}
