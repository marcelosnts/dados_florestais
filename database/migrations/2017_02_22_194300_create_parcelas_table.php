<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->float('area');
            $table->float('declividade');
            $table->float('largura')->default('0');
            $table->float('comprimento');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('formato');
            $table->integer('talhao_id')->unsigned();
            $table->integer('especie_id');

            $table->foreign('talhao_id')->references('id')->on('talhoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
}
