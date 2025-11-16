<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id('pendaftar_id');

            // FK ke warga
            $table->unsignedBigInteger('warga_id');
            $table->foreign('warga_id')->references('warga_id')->on('warga')->onDelete('cascade');

            // FK ke programs
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade');

            $table->string('status', 255)->nullable();
            $table->string('berkas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
