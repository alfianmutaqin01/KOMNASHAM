<?php

namespace App\Http\Controllers\Komisioner;

use App\Http\Controllers\Controller;
use App\Models\AssignmentLetter;
use App\Models\LetterSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AssignmentLetterController extends Controller
{
    
    public function create()
    {
        if (!Auth::check()) {
            abort(403, 'Anda harus login untuk membuat surat tugas.');
        }
        return view('komisioner.assignment_letters.create');
    }

    public function history()
    {
        $user = Auth::user();
        $query = AssignmentLetter::query();

        if ($user->hasRole('admin')) {
        } else {
            $query->where('user_id', $user->id);
        }
        $assignmentLetters = $query->latest()->paginate(10); // Paginate

        return view('komisioner.assignment_letters.history', compact('assignmentLetters'));
    }

    public function edit(AssignmentLetter $assignmentLetter)
    {
        if (Auth::id() !== $assignmentLetter->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit surat tugas ini.');
        }
        return view('komisioner.assignment_letters.edit', compact('assignmentLetter'));
    }

    public function destroy(AssignmentLetter $assignmentLetter)
    {
        if (auth()->id() !== $assignmentLetter->user_id && !auth()->user()->hasRole('admin')) {
        abort(403, 'Anda tidak memiliki akses untuk menghapus surat tugas ini.');
    }

    $assignmentLetter->delete();

    return redirect()->route('komisioner.surat.riwayat')->with('success', 'Surat tugas berhasil dihapus!');
    }

    public function printPdf(AssignmentLetter $assignmentLetter)
    {
        if (Auth::id() !== $assignmentLetter->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki akses untuk mencetak surat tugas ini.');
        }

        $settings = [
            'kop_surat_text' => LetterSetting::getSetting('kop_surat_text', "KOMISI DAERAH HAK ASASI MANUSIA\nKABUPATEN WONOSOBO"),
            'tanda_tangan_nama' => LetterSetting::getSetting('tanda_tangan_nama', 'Nama Pejabat'),
            'tanda_tangan_jabatan' => LetterSetting::getSetting('tanda_tangan_jabatan', 'Jabatan Pejabat'),
        ];

        $data = [
            'letter' => $assignmentLetter,
            'user' => $assignmentLetter->user,
            'currentDate' => Carbon::now()->translatedFormat('d F Y'),
            'settings' => $settings,
        ];

        $pdf = Pdf::loadView('komisioner.assignment_letters.print', $data);
        $safeFileName = str_replace(['/', '\\'], '_', $assignmentLetter->nomor_surat); // Membersihkan nama file
        return $pdf->download('Surat_Tugas_' . $safeFileName . '.pdf');
    }
}