<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('peserta_ppdb_id');
            $table->string('akte_kelahiran');
            $table->string('kk');
            $table->string('ktp_ortu');
            $table->string('ijazah');
            $table->string('kartu_pkh');
            $table->string('pas_foto');
            $table->timestamps();

            $table->foreign('peserta_ppdb_id')->references('id')->on('peserta_ppdb')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};
