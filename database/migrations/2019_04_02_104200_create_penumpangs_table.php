<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->bigIncrements('id_penumpang');
            $table->string('username', 20)->unique();
            $table->text('password');
            $table->text('nama_penumpang');
            $table->text('alamat_penumpang');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->text('telp');
            $table->boolean('islogin');
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
        Schema::dropIfExists('penumpangs');
    }
}
