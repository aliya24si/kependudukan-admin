<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasinya.
     */
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id'); // Primary Key
            $table->string('no_ktp', 20)->unique(); // UNQ
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama', 50);
            $table->string('pekerjaan', 100);
            $table->string('telp', 20);
            $table->string('email', 100);
        });
    }

    /**
     * Batalkan migrasi jika di-rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
