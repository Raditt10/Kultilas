<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DashboardContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'content',
        'category',
        'icon',
        'author',
        'is_active',
        'order',
        'expires_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
        'order' => 'integer'
    ];

    // Scope untuk konten aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where(function($q) {
                        $q->whereNull('expires_at')
                          ->orWhere('expires_at', '>', now());
                    });
    }

    // Scope berdasarkan tipe
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Accessor untuk format tanggal
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    // Check apakah sudah expired
    public function getIsExpiredAttribute()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    // Get type label in Indonesian
    public function getTypeLabel()
    {
        $types = [
            'news' => 'Berita',
            'announcement' => 'Pengumuman',
            'achievement' => 'Prestasi',
            'tip' => 'Tips',
            'event' => 'Acara'
        ];

        return $types[$this->type] ?? $this->type;
    }
}