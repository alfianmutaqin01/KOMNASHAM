<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session; 

class CreateReportForm extends Component
{
    protected $layout = 'dashboard';
    public Report $report;

    // Deklarasi properti lainnya tetap sama
    public $tanggal_sidak;
    public $lokasi;
    public $instansi_dikunjungi;
    public $tim_pelaksana;
    public $jenis_layanan_diamati;
    public $jumlah_wawancara_pengguna;
    public $jumlah_wawancara_petugas;

    // Aksesibilitas
    public $aksesibilitas_difabel_tersedia = false;
    public $area_pelayanan_mudah_dijangkau = false;
    public $temuan_khusus_aksesibilitas;

    // Non-Diskriminasi
    public $tidak_ditemukan_diskriminasi = false;
    public $petugas_melayani_semua = false;
    public $temuan_khusus_non_diskriminasi;

    // Transparansi & Informasi
    public $informasi_layanan_jelas = false;
    public $biaya_prosedur_dapat_diakses = false;
    public $temuan_khusus_transparansi;

    // Kualitas dan Kecepatan Pelayanan
    public $layanan_sesuai_prosedur = false;
    public $waktu_tunggu_relatif_cepat = false;
    public $temuan_khusus_kualitas;

    // Perlakuan terhadap Pengguna Layanan
    public $petugas_bersikap_ramah = false;
    public $tidak_ditemukan_intimidasi = false;
    public $temuan_khusus_perlakuan;

    // Mekanisme Pengaduan
    public $tersedia_sarana_aduan = false;
    public $warga_mengetahui_cara_aduan = false;
    public $temuan_khusus_mekanisme_pengaduan;

    public $analisis_umum;

    // Rekomendasi
    public $rekomendasi_papan_informasi = false;
    public $rekomendasi_kursi_roda = false;
    public $rekomendasi_pelatihan_petugas = false;
    public $rekomendasi_sistem_pengaduan = false;

    protected $rules = [
        'tanggal_sidak' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'instansi_dikunjungi' => 'required|string|max:255',
        'tim_pelaksana' => 'nullable|string',
        'jenis_layanan_diamati' => 'nullable|string|max:255',
        'jumlah_wawancara_pengguna' => 'nullable|integer|min:0',
        'jumlah_wawancara_petugas' => 'nullable|integer|min:0',
        'aksesibilitas_difabel_tersedia' => 'boolean',
        'area_pelayanan_mudah_dijangkau' => 'boolean',
        'temuan_khusus_aksesibilitas' => 'nullable|string',
        'tidak_ditemukan_diskriminasi' => 'boolean',
        'petugas_melayani_semua' => 'boolean',
        'temuan_khusus_non_diskriminasi' => 'nullable|string',
        'informasi_layanan_jelas' => 'boolean',
        'biaya_prosedur_dapat_diakses' => 'boolean',
        'temuan_khusus_transparansi' => 'nullable|string',
        'layanan_sesuai_prosedur' => 'boolean',
        'waktu_tunggu_relatif_cepat' => 'boolean',
        'temuan_khusus_kualitas' => 'nullable|string',
        'petugas_bersikap_ramah' => 'boolean',
        'tidak_ditemukan_intimidasi' => 'boolean',
        'temuan_khusus_perlakuan' => 'nullable|string',
        'tersedia_sarana_aduan' => 'boolean',
        'warga_mengetahui_cara_aduan' => 'boolean',
        'temuan_khusus_mekanisme_pengaduan' => 'nullable|string',
        'analisis_umum' => 'nullable|string',
        'rekomendasi_papan_informasi' => 'boolean',
        'rekomendasi_kursi_roda' => 'boolean',
        'rekomendasi_pelatihan_petugas' => 'boolean',
        'rekomendasi_sistem_pengaduan' => 'boolean',
    ];

    public function mount(?Report $report = null)
    {
        if ($report && $report->exists) {
            $this->report = $report;
            $this->fill($report->toArray());
            $this->tanggal_sidak = $report->tanggal_sidak->format('Y-m-d');
        } else {
            $this->report = new Report();
            $this->tanggal_sidak = Carbon::now()->format('Y-m-d');
        }
    }

    public function saveReport($submitAndPrint = false)
    {
        $this->validate();

        if ($this->report->exists) {
            $this->report->update([
                'tanggal_sidak' => $this->tanggal_sidak,
                'lokasi' => $this->lokasi,
                'instansi_dikunjungi' => $this->instansi_dikunjungi,
                'tim_pelaksana' => $this->tim_pelaksana,
                'jenis_layanan_diamati' => $this->jenis_layanan_diamati,
                'jumlah_wawancara_pengguna' => $this->jumlah_wawancara_pengguna,
                'jumlah_wawancara_petugas' => $this->jumlah_wawancara_petugas,
                'aksesibilitas_difabel_tersedia' => $this->aksesibilitas_difabel_tersedia,
                'area_pelayanan_mudah_dijangkau' => $this->area_pelayanan_mudah_dijangkau,
                'temuan_khusus_aksesibilitas' => $this->temuan_khusus_aksesibilitas,
                'tidak_ditemukan_diskriminasi' => $this->tidak_ditemukan_diskriminasi,
                'petugas_melayani_semua' => $this->petugas_melayani_semua,
                'temuan_khusus_non_diskriminasi' => $this->temuan_khusus_non_diskriminasi,
                'informasi_layanan_jelas' => $this->informasi_layanan_jelas,
                'biaya_prosedur_dapat_diakses' => $this->biaya_prosedur_dapat_diakses,
                'temuan_khusus_transparansi' => $this->temuan_khusus_transparansi,
                'layanan_sesuai_prosedur' => $this->layanan_sesuai_prosedur,
                'waktu_tunggu_relatif_cepat' => $this->waktu_tunggu_relatif_cepat,
                'temuan_khusus_kualitas' => $this->temuan_khusus_kualitas,
                'petugas_bersikap_ramah' => $this->petugas_bersikap_ramah,
                'tidak_ditemukan_intimidasi' => $this->tidak_ditemukan_intimidasi,
                'temuan_khusus_perlakuan' => $this->temuan_khusus_perlakuan,
                'tersedia_sarana_aduan' => $this->tersedia_sarana_aduan,
                'warga_mengetahui_cara_aduan' => $this->warga_mengetahui_cara_aduan,
                'temuan_khusus_mekanisme_pengaduan' => $this->temuan_khusus_mekanisme_pengaduan,
                'analisis_umum' => $this->analisis_umum,
                'rekomendasi_papan_informasi' => $this->rekomendasi_papan_informasi,
                'rekomendasi_kursi_roda' => $this->rekomendasi_kursi_roda,
                'rekomendasi_pelatihan_petugas' => $this->rekomendasi_pelatihan_petugas,
                'rekomendasi_sistem_pengaduan' => $this->rekomendasi_sistem_pengaduan,
            ]);
            Session::flash('success', 'Laporan berhasil diperbarui!');
        } else {
            $this->report = Report::create([
                'user_id' => auth()->id(),
                'tanggal_sidak' => $this->tanggal_sidak,
                'lokasi' => $this->lokasi,
                'instansi_dikunjungi' => $this->instansi_dikunjungi,
                'tim_pelaksana' => $this->tim_pelaksana,
                'jenis_layanan_diamati' => $this->jenis_layanan_diamati,
                'jumlah_wawancara_pengguna' => $this->jumlah_wawancara_pengguna,
                'jumlah_wawancara_petugas' => $this->jumlah_wawancara_petugas,
                'aksesibilitas_difabel_tersedia' => $this->aksesibilitas_difabel_tersedia,
                'area_pelayanan_mudah_dijangkau' => $this->area_pelayanan_mudah_dijangkau,
                'temuan_khusus_aksesibilitas' => $this->temuan_khusus_aksesibilitas,
                'tidak_ditemukan_diskriminasi' => $this->tidak_ditemukan_diskriminasi,
                'petugas_melayani_semua' => $this->petugas_melayani_semua,
                'temuan_khusus_non_diskriminasi' => $this->temuan_khusus_non_diskriminasi,
                'informasi_layanan_jelas' => $this->informasi_layanan_jelas,
                'biaya_prosedur_dapat_diakses' => $this->biaya_prosedur_dapat_diakses,
                'temuan_khusus_transparansi' => $this->temuan_khusus_transparansi,
                'layanan_sesuai_prosedur' => $this->layanan_sesuai_prosedur,
                'waktu_tunggu_relatif_cepat' => $this->waktu_tunggu_relatif_cepat,
                'temuan_khusus_kualitas' => $this->temuan_khusus_kualitas,
                'petugas_bersikap_ramah' => $this->petugas_bersikap_ramah,
                'tidak_ditemukan_intimidasi' => $this->tidak_ditemukan_intimidasi,
                'temuan_khusus_perlakuan' => $this->temuan_khusus_perlakuan,
                'tersedia_sarana_aduan' => $this->tersedia_sarana_aduan,
                'warga_mengetahui_cara_aduan' => $this->warga_mengetahui_cara_aduan,
                'temuan_khusus_mekanisme_pengaduan' => $this->temuan_khusus_mekanisme_pengaduan,
                'analisis_umum' => $this->analisis_umum,
                'rekomendasi_papan_informasi' => $this->rekomendasi_papan_informasi,
                'rekomendasi_kursi_roda' => $this->rekomendasi_kursi_roda,
                'rekomendasi_pelatihan_petugas' => $this->rekomendasi_pelatihan_petugas,
                'rekomendasi_sistem_pengaduan' => $this->rekomendasi_sistem_pengaduan,
                'status' => 'submitted',
            ]);
            Session::flash('success', 'Laporan berhasil disimpan!');
        }

        if ($submitAndPrint) {
            Session::flash('success', 'Laporan berhasil disimpan dan PDF akan dicetak!');
            $this->dispatch('open-pdf', url: route('komisioner.reports.print', ['report' => $this->report->id]));
            $this->resetForm(); 
            return; 
        } else {
            $this->resetForm(); 
            Session::flash('info', 'Draft laporan berhasil disimpan!');
            return; 
        }
    }

    private function resetForm()
    {
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.create-report-form');
    }
}