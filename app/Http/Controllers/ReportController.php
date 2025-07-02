<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function printPdf(Report $report)
    {
        if (auth()->id() !== $report->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $data = [
            'report' => $report,
            'user' => $report->user, // Memuat relasi user jika dibutuhkan di PDF
            'currentDate' => Carbon::now()->translatedFormat('d F Y'), // Untuk tanggal di footer PDF
        ];

        // Memuat view PDF dan memicu unduhan
        $pdf = Pdf::loadView('komisioner.reports.pdf', $data);
        return $pdf->download('Laporan_Sidak_' . $report->tanggal_sidak->format('Ymd') . '_' . $report->id . '.pdf');
    }
    public function history()
    {
        if (auth()->user()->role === 'admin') {
            $reports = Report::latest()->get(); // Admin melihat semua laporan
        } else {
            $reports = Report::where('user_id', auth()->id())->latest()->get(); // Komisioner hanya melihat laporannya sendiri
        }
        return view('komisioner.reports.history', compact('reports'));
    }
    public function edit(Report $report)
    {
        if (auth()->id() !== $report->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('komisioner.laporan.edit', compact('report'));
    }
    public function update(Request $request, Report $report)
    {
        if (auth()->id() !== $report->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Validasi data dari request
        $validatedData = $request->validate([
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
        ]);

        $report->update($validatedData);

        return redirect()->route('komisioner.laporan.riwayat')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Report $report)
    {
        // Otorisasi: Pastikan hanya pemilik laporan atau admin yang bisa menghapus
        if (auth()->id() !== $report->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Menghapus laporan dari database
        $report->delete();

        // Mengalihkan kembali ke riwayat laporan dengan pesan sukses
        return redirect()->route('komisioner.laporan.riwayat')->with('success', 'Laporan berhasil dihapus.');
    }
}