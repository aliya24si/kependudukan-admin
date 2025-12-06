<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->string('kode', 10)->unique();
            $table->string('nama_program', 100);
            $table->integer('tahun');
            $table->text('deskripsi')->nullable();
            $table->decimal('anggaran', 15, 2);
            $table->string('media')->nullable(); // tetap ada jika butuh
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
