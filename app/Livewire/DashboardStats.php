<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report; // Untuk Laporan Sidak
use App\Models\ActivityReport; // Untuk Laporan Kegiatan
use App\Models\AssignmentLetter; // Untuk Surat Tugas
use App\Models\User; // Untuk relasi user di aktivitas
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Untuk query database mentah

class DashboardStats extends Component
{
    // Properti untuk menyimpan data statistik
    public $totalLaporanSidak;
    public $totalLaporanKegiatan;
    public $totalSuratTugas;
    public $laporanSidakPerStatus;
    public $laporanKegiatanPerStatus;
    public $laporanBulanan; // Data untuk grafik bulanan
    public $latestActivities; // TAMBAH: Properti untuk aktivitas terbaru

    /**
     * Metode mount dipanggil saat komponen diinisialisasi.
     * Digunakan untuk memuat semua data statistik.
     *
     * @return void
     */
    public function mount()
    {
        $this->loadStats();
    }

    /**
     * Memuat semua data statistik dari database.
     *
     * @return void
     */
    private function loadStats()
    {
        // Total Laporan
        $this->totalLaporanSidak = Report::count();
        $this->totalLaporanKegiatan = ActivityReport::count();
        $this->totalSuratTugas = AssignmentLetter::count();

        // Laporan Sidak per Status
        $this->laporanSidakPerStatus = Report::select('status', DB::raw('count(*) as total'))
                                            ->groupBy('status')
                                            ->get()
                                            ->map(function ($item) {
                                                return ['label' => ucfirst($item->status), 'value' => $item->total];
                                            });

        // Laporan Kegiatan per Status
        $this->laporanKegiatanPerStatus = ActivityReport::select('status', DB::raw('count(*) as total'))
                                                        ->groupBy('status')
                                                        ->get()
                                                        ->map(function ($item) {
                                                            return ['label' => ucfirst($item->status), 'value' => $item->total];
                                                        });

        // Laporan Bulanan (Total Laporan Sidak + Kegiatan selama 12 bulan terakhir)
        $this->laporanBulanan = collect([]);
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $totalSidak = Report::whereYear('created_at', $month->year)
                                ->whereMonth('created_at', $month->month)
                                ->count();
            $totalKegiatan = ActivityReport::whereYear('created_at', $month->year)
                                            ->whereMonth('created_at', $month->month)
                                            ->count();

            $this->laporanBulanan->push([
                'bulan' => $month->translatedFormat('M Y'), // Contoh: Jul 2025
                'total' => $totalSidak + $totalKegiatan,
                'sidak' => $totalSidak,
                'kegiatan' => $totalKegiatan,
            ]);
        }

        // TAMBAH: Ambil aktivitas terbaru (misal 5 aktivitas terakhir)
        // Gabungkan laporan sidak dan laporan kegiatan
        $latestReports = Report::select('id', 'created_at', DB::raw("'Laporan Sidak' as type"), 'lokasi as description', 'user_id')
                                ->orderBy('created_at', 'desc')
                                ->limit(5);

        $latestActivities = ActivityReport::select('id', 'created_at', DB::raw("'Laporan Kegiatan' as type"), 'nama_kegiatan as description', 'user_id')
                                        ->orderBy('created_at', 'desc')
                                        ->limit(5);

        $this->latestActivities = $latestReports->union($latestActivities)
                                                ->orderBy('created_at', 'desc')
                                                ->with('user') // Pastikan relasi user ada di kedua model (Report dan ActivityReport)
                                                ->get();
    }

    /**
     * Merender view Blade komponen.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
