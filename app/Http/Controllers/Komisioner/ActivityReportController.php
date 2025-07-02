<?php

namespace App\Http\Controllers\Komisioner; // Perhatikan namespace ini

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityReport;
use Barryvdh\DomPDF\Facade\Pdf; // Jika akan ada fungsi cetak PDF di sini
use Carbon\Carbon; // Jika digunakan di view PDF

class ActivityReportController extends Controller
{
    // Method untuk menampilkan form pembuatan laporan kegiatan baru (GET request)
    public function create()
    {
        // Mengembalikan Livewire Page Component untuk form pembuatan
        // Karena ini Livewire Page Component, tidak perlu view Blade perantara
        return \App\Livewire\CreateActivityReportForm::class; // Mengacu langsung ke kelas Livewire Component
    }

    // Method untuk menampilkan riwayat laporan kegiatan
    public function history()
    {
        // Otorisasi: Hanya user dengan peran 'komisioner' atau 'admin' yang bisa melihat
        // Sesuaikan dengan logic peran Anda
        if (!auth()->user()->hasRole('admin') && !auth()->user()->hasRole('komisioner')) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        if (auth()->user()->hasRole('admin')) {
            $activityReports = ActivityReport::latest()->get(); // Admin melihat semua
        } else {
            $activityReports = ActivityReport::where('user_id', auth()->id())->latest()->get(); // Komisioner melihat laporannya sendiri
        }

        return view('komisioner.activity_reports.history', compact('activityReports'));
    }

    // Method untuk menampilkan form edit laporan kegiatan (GET request)
    public function edit(ActivityReport $activityReport)
    {
        // Otorisasi: Hanya pemilik laporan atau admin yang bisa mengedit
        if (auth()->id() !== $activityReport->user_id && !auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        // Mengembalikan Livewire Page Component untuk form edit
        return \App\Livewire\CreateActivityReportForm::mount($activityReport); // Mengacu langsung ke kelas Livewire Component
    }

    // Method untuk menghapus laporan kegiatan
    public function destroy(ActivityReport $activityReport)
    {
        // Otorisasi: Hanya pemilik laporan atau admin yang bisa menghapus
        if (auth()->id() !== $activityReport->user_id && !auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $activityReport->delete();
        return redirect()->route('komisioner.kegiatan.riwayat')->with('success', 'Laporan kegiatan berhasil dihapus!');
    }

    // Method untuk mencetak PDF laporan kegiatan (Jika ada)
    public function printPdf(ActivityReport $activityReport)
    {
        if (auth()->id() !== $activityReport->user_id && !auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $data = [
            'activityReport' => $activityReport,
            'user' => $activityReport->user,
            'currentDate' => Carbon::now()->translatedFormat('d F Y'),
        ];

        $pdf = Pdf::loadView('komisioner.activity_reports.pdf', $data); // Buat view PDF terpisah
        return $pdf->download('Laporan_Kegiatan_' . $activityReport->tanggal_mulai->format('Ymd') . '_' . $activityReport->id . '.pdf');
    }
}