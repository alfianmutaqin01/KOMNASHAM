<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_surat',
        'nama_komisioner',
        'jabatan_komisioner',
        'tujuan_penugasan',
        'tempat_tugas',
        'tanggal_mulai_tugas',
        'tanggal_selesai_tugas',
        'perihal',
        'dasar_hukum',
    ];

    protected $casts = [
        'tanggal_mulai_tugas' => 'date',
        'tanggal_selesai_tugas' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('nomor_surat', 'like', '%' . $value . '%')
                     ->orWhere('nama_komisioner', 'like', '%' . $value . '%')
                     ->orWhere('tujuan_penugasan', 'like', '%' . $value . '%');
    }
}