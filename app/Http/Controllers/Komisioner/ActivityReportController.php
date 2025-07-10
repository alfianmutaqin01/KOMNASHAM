<?php

namespace App\Http\Controllers\Komisioner; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityReport;
use Barryvdh\DomPDF\Facade\Pdf; 
use Carbon\Carbon; 

class ActivityReportController extends Controller
{
   
    public function create()
    {
        return \App\Livewire\CreateActivityReportForm::class; 
    }

    public function history()
{
    if (!auth()->check()) {
        abort(403, 'Anda harus login untuk mengakses halaman ini.');
    }

    if (auth()->user()->hasRole('admin')) {
        $activityReports = ActivityReport::latest()->paginate(10);
    } else {
        $activityReports = ActivityReport::where('user_id', auth()->id())->latest()->paginate(10);
    }

    return view('komisioner.activity_reports.history', compact('activityReports'));
}


    public function edit(ActivityReport $activityReport)
    {
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

    public function destroy(ActivityReport $activityReport)
    {
        if (auth()->id() !== $activityReport->user_id && !auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $activityReport->delete();
        return redirect()->route('komisioner.kegiatan.riwayat')->with('success', 'Laporan kegiatan berhasil dihapus!');
    }

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

        $pdf = Pdf::loadView('komisioner.activity_reports.pdf', $data); 
        return $pdf->download('Laporan_Kegiatan_' . $activityReport->tanggal_mulai->format('Ymd') . '_' . $activityReport->id . '.pdf');
    }
}