<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\LetterSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use App\Models\AssignmentLetter;

class LetterSettings extends Component
{
    public $nomor_surat_terakhir_format;
    public $kop_surat_text;
    public $tanda_tangan_nama;
    public $tanda_tangan_jabatan;

    public $totalSuratTahunIni;
    public $totalSuratKeseluruhan;
    public $yearlyLetterCounts;

    protected $rules = [
        'nomor_surat_terakhir_format' => 'required|string|max:255',
        'kop_surat_text' => 'nullable|string',
        'tanda_tangan_nama' => 'required|string|max:255',
        'tanda_tangan_jabatan' => 'required|string|max:255',
    ];

    public function mount()
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki akses ke pengaturan ini.');
        }

        $this->nomor_surat_terakhir_format = LetterSetting::getSetting('nomor_surat_terakhir_format', '000/SK/KOMDAHAM/VII/YYYY');
        $this->kop_surat_text = LetterSetting::getSetting('kop_surat_text', "KOMISI DAERAH HAK ASASI MANUSIA\nKABUPATEN WONOSOBO");
        $this->tanda_tangan_nama = LetterSetting::getSetting('tanda_tangan_nama', 'Nama Pejabat');
        $this->tanda_tangan_jabatan = LetterSetting::getSetting('tanda_tangan_jabatan', 'Jabatan Pejabat');

        $this->loadLetterStats(); 
    }

    private function loadLetterStats()
    {
        $currentYear = Carbon::now()->year;
        $this->totalSuratTahunIni = \App\Models\AssignmentLetter::where('tahun', $currentYear)->count();
        $this->totalSuratKeseluruhan = \App\Models\AssignmentLetter::count();
        $this->yearlyLetterCounts = AssignmentLetter::selectRaw('tahun, count(*) as total')
                                                    ->groupBy('tahun')
                                                    ->orderBy('tahun', 'desc')
                                                    ->get();
    }

    public function saveSettings()
    {
        $this->validate();

        LetterSetting::setSetting('nomor_surat_terakhir_format', $this->nomor_surat_terakhir_format, 'Format nomor surat tugas');
        LetterSetting::setSetting('kop_surat_text', $this->kop_surat_text, 'Teks kop surat');
        LetterSetting::setSetting('tanda_tangan_nama', $this->tanda_tangan_nama, 'Nama pejabat penanda tangan');
        LetterSetting::setSetting('tanda_tangan_jabatan', $this->tanda_tangan_jabatan, 'Jabatan pejabat penanda tangan');

        Session::flash('success', 'Pengaturan surat berhasil diperbarui!');
        $this->loadLetterStats(); 
    }

    public function render()
    {
        return view('livewire.admin.letter-settings');
    }
}
