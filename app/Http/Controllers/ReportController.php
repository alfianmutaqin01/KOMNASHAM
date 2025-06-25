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
    // Pastikan hanya user yang bersangkutan atau admin yang bisa mencetak
    if (auth()->id() !== $report->user_id && auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $data = [
        'report' => $report,
        'user' => $report->user, // Load user relationship
        'currentDate' => Carbon::now()->translatedFormat('d F Y'), // Untuk tanggal di footer PDF 
    ];

    $pdf = Pdf::loadView('komisioner.reports.pdf', $data);
    return $pdf->download('Laporan_Sidak_' . $report->tanggal_sidak->format('Ymd') . '_' . $report->id . '.pdf');
}

    // Method untuk menampilkan riwayat laporan
    public function history()
    {
        $reports = Report::where('user_id', auth()->id())->latest()->get();
        return view('komisioner.reports.history', compact('reports'));
    }
}