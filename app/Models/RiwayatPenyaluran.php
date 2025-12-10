<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyaluran extends Model
{
    protected $table = 'riwayat_penyaluran_bantuan';
    protected $primaryKey = 'penyaluran_id';

    protected $fillable = [
        'program_id',
        'penerima_id',
        'tahap_ke',
        'tanggal',
        'nilai',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function penerima()
    {
        return $this->belongsTo(PenerimaBantuan::class, 'penerima_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'penyaluran_id')
                ->where('ref_table', 'penyaluran_bantuan');
    }
}
