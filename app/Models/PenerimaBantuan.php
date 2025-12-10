<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    protected $table = 'penerima_bantuan';
    protected $primaryKey = 'penerima_id';

    protected $fillable = [
        'program_id',
        'warga_id',
        'keterangan'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
