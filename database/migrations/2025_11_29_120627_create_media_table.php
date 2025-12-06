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
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');

            // Hubungan generic ke tabel manapun
            $table->string('ref_table');              // contoh: 'programs', 'berita', 'agenda'
            $table->unsignedBigInteger('ref_id');

            // Informasi file (konsisten dengan controller)
            $table->string('file_path');              // path di storage (contoh: media/program/xxx.jpg)
            $table->string('file_name');              // nama file asli
            $table->string('file_type')->nullable();  // mime type
            $table->unsignedBigInteger('file_size')->nullable(); // ukuran file (bytes)
            $table->string('caption')->nullable();    // opsional
            $table->integer('sort_order')->nullable();

            $table->timestamps();

            // INDEX agar pencarian media lebih cepat
            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
