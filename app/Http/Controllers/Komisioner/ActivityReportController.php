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
    // Pastikan user sudah login
    if (!auth()->check()) {
        abort(403, 'Anda harus login untuk mengakses halaman ini.');
    }

    // Ambil data sesuai role
    if (auth()->user()->hasRole('admin')) {
        // Admin bisa melihat semua laporan
        $activityReports = ActivityReport::latest()->get();
    } else {
        // Komisioner dan user biasa hanya melihat laporan miliknya
        $activityReports = ActivityReport::where('user_id', auth()->id())->latest()->get();
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
        return view('komisioner.activity_reports.edit', compact('activityReport'));
    }

    public function update(Request $request, ActivityReport $activityReport)
{
    if (auth()->id() !== $activityReport->user_id && !auth()->user()->hasRole('admin')) {
        abort(403, 'Unauthorized action.');
    }

    $validated = $request->validate([
        'nama_kegiatan' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'lokasi_kegiatan' => 'required|string|max:255',
        'tujuan_kegiatan' => 'required|string',
        'pihak_terlibat' => 'nullable|string',
        'deskripsi_singkat' => 'required|string',
        'hasil_kegiatan' => 'required|string',
        'tindak_lanjut' => 'nullable|string',
        'permasalahan_tantangan' => 'nullable|string',
    ]);

    $activityReport->update($validated);

    return redirect()->route('komisioner.kegiatan.riwayat')->with('success', 'Laporan kegiatan berhasil diperbarui!');
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