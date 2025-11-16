<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email',
        'foto_profil',
    ];

    public function pendaftaranEskul()
    {
        return $this->hasMany(PendaftaranEskul::class, 'id_siswa', 'id_siswa');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_siswa', 'id_siswa');
    }

    public function prestasi()
    {
        return $this->hasManyThrough(
            Prestasi::class,
            PendaftaranEskul::class,
            'id_siswa', // Foreign key on pendaftaran_eskul table
            'id_pendaftaran', // Foreign key on prestasi table
            'id_siswa', // Local key on siswa table
            'id_pendaftaran' // Local key on pendaftaran_eskul table
        );
    }
}
