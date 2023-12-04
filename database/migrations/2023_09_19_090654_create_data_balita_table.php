<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_balita', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->string('umur');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_balita');
    }
}
