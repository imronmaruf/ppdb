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
        Schema::create('wali', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('peserta_ppdb_id');
            $table->string('nama_wali');
            $table->string('tahun_lahir');
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('peserta_ppdb_id')->references('id')->on('peserta_ppdb')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wali');
    }
};
