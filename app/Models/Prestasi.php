<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    public $timestamps = false;

    protected $fillable = [
        'id_pendaftaran',
        'nama_prestasi',
        'tingkat',
        'tanggal',
        'deskripsi',
        'sertifikat',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(PendaftaranEskul::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
