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
        Schema::create('peserta_ppdb', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->string('name');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kk', 20);
            $table->string('nik', 16);
            $table->string('no_akte_kelahiran', 20);
            $table->enum('status_pkh', ['ada', 'tidak']);
            $table->string('asal_sekolah');
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'buddha', 'konghucu']);
            $table->string('alamat');
            $table->string('tinggal_dengan');
            $table->string('anak_ke', 2);
            $table->string('jml_saudara_kandung', 2);
            $table->float('tinggi_badan', 5);
            $table->float('berat_badan', 5);
            $table->enum('status', ['verifikasi', 'diterima', 'ditolak']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peserta_ppdb');
    }
};
