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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('tipe'); // Isinya 'foto' atau 'video'
            $table->string('sumber_tipe')->default('upload'); // Isinya 'upload' atau 'link'
            $table->string('path'); // Nama file gambar atau link embed YouTube
            $table->text('keterangan')->nullable();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
