<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutes', function (Blueprint $table) {
            $table->bigIncrements('id_rute');
            $table->char('kode', 10);
            $table->string('tujuan', 20);
            $table->string('rute_awal', 20);
            $table->string('rute_akhir', 20);
            $table->integer('harga');
            $table->integer('id_transportasi');
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
        Schema::dropIfExists('rutes');
    }
}
