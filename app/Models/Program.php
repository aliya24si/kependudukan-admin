<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $primaryKey = 'program_id';

    protected $fillable = [
        'kode',
        'nama_program',
        'tahun',
        'deskripsi',
        'anggaran',
        'media'
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'program_id');
    }
}
