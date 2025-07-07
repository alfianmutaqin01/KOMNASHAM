<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\LetterSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LetterSettings extends Component
{
    // Properti untuk pengaturan yang akan diikat ke form
    public $nomor_surat_terakhir;
    public $kop_surat_text;
    public $tanda_tangan_nama;
    public $tanda_tangan_jabatan;

    protected $rules = [
        'nomor_surat_terakhir' => 'required|string|max:255',
        'kop_surat_text' => 'nullable|string',
        'tanda_tangan_nama' => 'required|string|max:255',
        'tanda_tangan_jabatan' => 'required|string|max:255',
    ];

    public function mount()
    {
        if (!Auth::user()->hasRole('admin')) { // Memeriksa peran admin
            abort(403, 'Anda tidak memiliki akses ke pengaturan ini.');
        }

        $this->nomor_surat_terakhir = LetterSetting::getSetting('nomor_surat_terakhir', '000/SK/KOMDAHAM/VII/2025');
        $this->kop_surat_text = LetterSetting::getSetting('kop_surat_text', "KOMISI DAERAH HAK ASASI MANUSIA\nKABUPATEN WONOSOBO");
        $this->tanda_tangan_nama = LetterSetting::getSetting('tanda_tangan_nama', 'Nama Pejabat');
        $this->tanda_tangan_jabatan = LetterSetting::getSetting('tanda_tangan_jabatan', 'Jabatan Pejabat');
    }

    public function saveSettings()
    {
        $this->validate(); 
        
        LetterSetting::setSetting('nomor_surat_terakhir', $this->nomor_surat_terakhir, 'Nomor surat tugas terakhir');
        LetterSetting::setSetting('kop_surat_text', $this->kop_surat_text, 'Teks kop surat');
        LetterSetting::setSetting('tanda_tangan_nama', $this->tanda_tangan_nama, 'Nama pejabat penanda tangan');
        LetterSetting::setSetting('tanda_tangan_jabatan', $this->tanda_tangan_jabatan, 'Jabatan pejabat penanda tangan');

        Session::flash('success', 'Pengaturan surat berhasil diperbarui!'); // Beri pesan sukses
    }

    public function render()
    {
        return view('livewire.admin.letter-settings'); // Render view Blade komponen
    }
}