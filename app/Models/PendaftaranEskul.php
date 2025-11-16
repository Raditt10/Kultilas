<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranEskul extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_eskul';
    protected $primaryKey = 'id_pendaftaran';
    public $timestamps = false;

    protected $fillable = [
        'id_siswa',
        'id_eskul',
        'tanggal_daftar',
        'status',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class, 'id_eskul', 'id_eskul');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
