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
        'status'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    // ⭐ FIX relasi media
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'pendaftar_id')
                    ->where('ref_table', 'pendaftar');
    }
}
