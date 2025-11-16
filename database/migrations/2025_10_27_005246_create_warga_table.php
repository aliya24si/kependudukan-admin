<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id');
            $table->string('no_ktp', 20)->unique();
            $table->string('nama', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('agama', 50)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('email', 100)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
