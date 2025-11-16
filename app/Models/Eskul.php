<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $table = 'eskul';
    protected $primaryKey = 'id_eskul';
    public $timestamps = false;

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'id_eskul';
    }

    protected $fillable = [
        'nama_eskul',
        'deskripsi',
        'pembina',
        'hari_kegiatan',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'kuota',
        'foto_eskul',
    ];

    public function pendaftaranEskul()
    {
        return $this->hasMany(PendaftaranEskul::class, 'id_eskul', 'id_eskul');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_eskul', 'id_eskul');
    }
}
