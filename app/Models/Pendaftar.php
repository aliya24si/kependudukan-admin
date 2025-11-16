<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'pendaftar_id';

    protected $fillable = [
        'warga_id',
        'program_id',
        'status',
        'berkas'
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
