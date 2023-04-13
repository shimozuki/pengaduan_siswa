<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
            $table->unsignedBigInteger('id_pengaduan');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduans')->cascadeOnDelete();
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->cascadeOnDelete();
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
        Schema::dropIfExists('tanggapans');
    }
};
