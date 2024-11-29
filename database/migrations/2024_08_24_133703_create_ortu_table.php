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
        Schema::create('ortu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('peserta_ppdb_id');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ayah');
            $table->string('alamat_ibu');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->enum('pendidikan_ayah', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->enum('pendidikan_ibu', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->timestamps();

            $table->foreign('peserta_ppdb_id')->references('id')->on('peserta_ppdb')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ortu');
    }
};
