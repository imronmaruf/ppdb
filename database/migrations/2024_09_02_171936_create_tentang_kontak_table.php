<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tentang_kontak', function (Blueprint $table) {
            $table->id();
            $table->text('konten_tentang');
            $table->string('foto');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp', 20);
            $table->string('wa_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kontak');
    }
};
