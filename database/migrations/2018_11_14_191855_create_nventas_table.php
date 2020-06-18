<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrea');
            $table->string('nombrec');
            $table->string('nombrep');
            $table->integer('cantidadr');
            $table->integer('totalp');
            $table->string('fechav');
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
        Schema::dropIfExists('nventas');

    }
}
