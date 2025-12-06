<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table      = 'media';
    protected $primaryKey = 'media_id';
    public $incrementing  = true;

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'caption',
        'sort_order',
    ];

    // Relasi generic: media bisa belong ke program bila ref_table == 'programs'
    public function program()
    {
        return $this->belongsTo(Program::class, 'ref_id', 'program_id')
            ->where('ref_table', 'programs');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'ref_id', 'pendaftar_id')
            ->where('ref_table', 'pendaftar');
    }

}
