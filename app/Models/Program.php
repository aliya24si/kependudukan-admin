<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table      = 'programs';
    protected $primaryKey = 'program_id';
    public $incrementing  = true;

    protected $fillable = [
        'kode',
        'nama_program',
        'tahun',
        'deskripsi',
        'anggaran',
        'media',
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'program_id');
    }

    // Media untuk program ini; pastikan ref_table sama -> 'programs'
    public function media()
    {
        return $this->hasMany(\App\Models\Media::class, 'ref_id', 'program_id')
            ->where('ref_table', 'programs')
            ->orderBy('sort_order');
    }
}
