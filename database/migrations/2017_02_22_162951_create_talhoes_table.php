<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalhoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talhoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod');
            $table->integer('area');
            $table->string('descricao');
            $table->string('data_plantio');
            $table->integer('estrato_id')->unsigned();
            $table->string('nome_arquivo');

            $table->foreign('estrato_id')->references('id')->on('estratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talhoes');
    }
}
