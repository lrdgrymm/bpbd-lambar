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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); // Untuk URL
        $table->string('external_link')->nullable(); // Untuk link ke media lain
        $table->text('ringkasan');
        $table->longText('isi_berita');
        $table->string('gambar');
        $table->string('penulis');
        $table->timestamp('tanggal_publikasi')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
