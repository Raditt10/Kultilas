<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'foto_profile',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'terakhir_login' => 'datetime',
    ];

    // Override default email field to username
    public function getEmailAttribute()
    {
        return $this->username;
    }

    // Tell Laravel to use username instead of email for authentication
    public function username()
    {
        return 'username';
    }
}
