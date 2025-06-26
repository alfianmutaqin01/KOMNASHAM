<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_sidak',
        'lokasi',
        'instansi_dikunjungi',
        'tim_pelaksana',
        'jenis_layanan_diamati',
        'jumlah_wawancara_pengguna',
        'jumlah_wawancara_petugas',
        'aksesibilitas_difabel_tersedia',
        'area_pelayanan_mudah_dijangkau',
        'temuan_khusus_aksesibilitas',
        'tidak_ditemukan_diskriminasi',
        'petugas_melayani_semua',
        'temuan_khusus_non_diskriminasi',
        'informasi_layanan_jelas',
        'biaya_prosedur_dapat_diakses',
        'temuan_khusus_transparansi',
        'layanan_sesuai_prosedur',
        'waktu_tunggu_relatif_cepat',
        'temuan_khusus_kualitas',
        'petugas_bersikap_ramah',
        'tidak_ditemukan_intimidasi',
        'temuan_khusus_perlakuan',
        'tersedia_sarana_aduan',
        'warga_mengetahui_cara_aduan',
        'temuan_khusus_mekanisme_pengaduan',
        'analisis_umum',
        'rekomendasi_papan_informasi',
        'rekomendasi_kursi_roda',
        'rekomendasi_pelatihan_petugas',
        'rekomendasi_sistem_pengaduan',
        'status',
    ];

    protected $casts = [
        'tanggal_sidak' => 'date',
        'aksesibilitas_difabel_tersedia' => 'boolean',
        'area_pelayanan_mudah_dijangkau' => 'boolean',
        'tidak_ditemukan_diskriminasi' => 'boolean',
        'petugas_melayani_semua' => 'boolean',
        'informasi_layanan_jelas' => 'boolean',
        'biaya_prosedur_dapat_diakses' => 'boolean',
        'layanan_sesuai_prosedur' => 'boolean',
        'waktu_tunggu_relatif_cepat' => 'boolean',
        'petugas_bersikap_ramah' => 'boolean',
        'tidak_ditemukan_intimidasi' => 'boolean',
        'tersedia_sarana_aduan' => 'boolean',
        'warga_mengetahui_cara_aduan' => 'boolean',
        'rekomendasi_papan_informasi' => 'boolean',
        'rekomendasi_kursi_roda' => 'boolean',
        'rekomendasi_pelatihan_petugas' => 'boolean',
        'rekomendasi_sistem_pengaduan' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}