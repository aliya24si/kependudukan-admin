<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';  // nama tabel

    protected $primaryKey = 'warga_id'; // sesuaikan jika pk bukan 'id'

    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];

    public $timestamps = false; // jika tidak ada kolom created_at & updated_at
}
