<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tproductos', function (Blueprint $table) {
            $table->increments('idpro');  
            $table->string('nombre');
            $table->string('descri');
            $table->string('perfil')->nullable();
            $table->integer('cantidad');
            $table->integer('preciotp');
            $table->integer('preciocu');
            $table->integer('preciovu');
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
        Schema::dropIfExists('tproductos');
    }
}
