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
            $table->string('akte_kelahiran')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp_ortu')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('kartu_pkh')->nullable();
            $table->string('pas_foto')->nullable();
            $table->timestamps();

            $table->foreign('peserta_ppdb_id')->references('id')->on('peserta_ppdb')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};
