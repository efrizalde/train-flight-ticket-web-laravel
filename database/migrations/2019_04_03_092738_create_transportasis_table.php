<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportasis', function (Blueprint $table) {
            $table->bigIncrements('id_transportasi');
            $table->char('kode', 10);
            $table->text('keterangan');
            $table->integer('jumlah_kursi');
            $table->integer('id_type_transportasi');
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
        Schema::dropIfExists('transportasis');
    }
}
