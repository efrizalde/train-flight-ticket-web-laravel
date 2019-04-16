<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->char('kode_pemesanan', 10);
            $table->dateTime('tanggal_pemesanan');
            $table->text('tempat_pemesanan');
            $table->integer('id_penumpang');
            $table->char('kode_kursi', 10);
            $table->integer('id_rute');
            $table->text('tujuan');
            $table->dateTime('tanggal_berangkat');
            $table->dateTime('jam_cekin');
            $table->dateTime('jam_berangkat');
            $table->integer('total_bayar');
            $table->integer('id_petugas')->default(0);
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
        Schema::dropIfExists('pemesanans');
    }
}
