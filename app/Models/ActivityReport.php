<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jabatan_komisioner',
        'nama_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi_kegiatan',
        'tujuan_kegiatan',
        'pihak_terlibat',
        'deskripsi_singkat',
        'hasil_kegiatan',
        'tindak_lanjut',
        'permasalahan_tantangan',
        'lampiran',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'lampiran' => 'array', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('nama_kegiatan', 'like', '%' . $value . '%')
                     ->orWhere('lokasi_kegiatan', 'like', '%' . $value . '%')
                     ->orWhere('deskripsi_singkat', 'like', '%' . $value . '%');
    }
}