<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifikasiLapangan extends Model
{
    protected $table = 'verifikasi_lapangan';
    protected $primaryKey = 'verifikasi_id';

    protected $fillable = [
        'pendaftar_id',
        'petugas',
        'tanggal',
        'catatan',
        'skor'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id', 'pendaftar_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'verifikasi_id')
                    ->where('ref_table', 'verifikasi_lapangan');
    }
}
