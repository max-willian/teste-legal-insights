<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_unico_processo', 40);
            $table->date('data_distribuicao');
            $table->string('reu_principal', 200);
            $table->float('valor_causa', 8, 2);
            $table->string('vara', 60);
            $table->string('comarca', 100);
            $table->string('estado', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('processos');
    }
}
