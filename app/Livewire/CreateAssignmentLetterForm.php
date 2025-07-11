<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AssignmentLetter;
use App\Models\LetterSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateAssignmentLetterForm extends Component
{
    public AssignmentLetter $assignmentLetter;

    public $nama_komisioner;
    public $jabatan_komisioner;
    public $tujuan_penugasan;
    public $tempat_tugas;
    public $tanggal_mulai_tugas;
    public $tanggal_selesai_tugas;
    public $perihal;
    public $dasar_hukum;

    public $nomor_surat_terakhir_format;
    public $kop_surat_text;
    public $tanda_tangan_nama;
    public $tanda_tangan_jabatan;

    protected $rules = [
        'nama_komisioner' => 'required|string|max:255',
        'jabatan_komisioner' => 'required|string|max:255',
        'tujuan_penugasan' => 'required|string',
        'tempat_tugas' => 'required|string|max:255',
        'tanggal_mulai_tugas' => 'required|date',
        'tanggal_selesai_tugas' => 'required|date|after_or_equal:tanggal_mulai_tugas',
        'perihal' => 'nullable|string',
        'dasar_hukum' => 'nullable|string',
    ];

    public function mount(?AssignmentLetter $assignmentLetter = null)
    {
        $user = Auth::user();

        if ($assignmentLetter && $assignmentLetter->exists) {
            if ($user->id !== $assignmentLetter->user_id && !$user->hasRole('admin')) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit surat tugas ini.');
            }
            $this->assignmentLetter = $assignmentLetter;
            $this->fill($assignmentLetter->toArray());
            $this->tanggal_mulai_tugas = $assignmentLetter->tanggal_mulai_tugas->format('Y-m-d');
            $this->tanggal_selesai_tugas = $assignmentLetter->tanggal_selesai_tugas->format('Y-m-d');
        } else {
            $this->assignmentLetter = new AssignmentLetter();
            $this->nama_komisioner = $user->name;
            $this->jabatan_komisioner = $user->jabatan;
            $this->tanggal_mulai_tugas = Carbon::now()->format('Y-m-d');
            $this->tanggal_selesai_tugas = Carbon::now()->format('Y-m-d');
        }

        $this->loadLetterSettings();
    }

    private function loadLetterSettings()
    {
        $this->nomor_surat_terakhir_format = LetterSetting::getSetting('nomor_surat_terakhir_format', '000/SK/KOMDAHAM/VII/YYYY');
        $this->kop_surat_text = LetterSetting::getSetting('kop_surat_text', "KOMISI DAERAH HAK ASASI MANUSIA\nKABUPATEN WONOSOBO");
        $this->tanda_tangan_nama = LetterSetting::getSetting('tanda_tangan_nama', 'Nama Pejabat');
        $this->tanda_tangan_jabatan = LetterSetting::getSetting('tanda_tangan_jabatan', 'Jabatan Pejabat');
    }

    public function saveLetter($submitAndPrint = false)
    {
        $this->validate();

        // Logika generate nomor surat jika ini surat baru
        if (!$this->assignmentLetter->exists) {
            $tahun_surat = Carbon::parse($this->tanggal_mulai_tugas)->year;
            $bulan_surat_romawi = strtoupper(Carbon::parse($this->tanggal_mulai_tugas)->translatedFormat('M')); // Menggunakan translatedFormat untuk bulan Romawi

            // Dapatkan nomor urut terakhir untuk TAHUN DAN BULAN ini
            $lastLetterForMonthAndYear = AssignmentLetter::where('tahun', $tahun_surat)
                                                        ->where(DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(nomor_surat, '/', -2), '/', 1)"), $bulan_surat_romawi)
                                                        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(nomor_surat, '/', 1) AS UNSIGNED)"), 'desc')
                                                        ->first();

            $lastNumber = 0;
            if ($lastLetterForMonthAndYear) {
                $parts = explode('/', $lastLetterForMonthAndYear->nomor_surat);
                $lastNumber = (int)($parts[0] ?? 0);
            }
            $newNumber = $lastNumber + 1;

            // Ambil format dari pengaturan admin
            $format_template = $this->nomor_surat_terakhir_format;

            // Ganti placeholder di format dengan nilai yang sesuai
            $generatedNomorSurat = str_replace(
                ['000', 'YYYY', 'MM', 'DD', 'bulan'], // Placeholder yang mungkin ada
                [sprintf("%03d", $newNumber), $tahun_surat, Carbon::parse($this->tanggal_mulai_tugas)->format('m'), Carbon::parse($this->tanggal_mulai_tugas)->format('d'), $bulan_surat_romawi],
                $format_template
            );

            // Periksa apakah nomor surat yang digenerate sudah ada di database
            $existingLetter = AssignmentLetter::where('nomor_surat', $generatedNomorSurat)->first();
            if ($existingLetter) {
                // Jika nomor surat sudah ada, coba lagi dengan nomor berikutnya
                $newNumber++;
                $generatedNomorSurat = str_replace(
                    ['000', 'YYYY', 'MM', 'DD', 'bulan'],
                    [sprintf("%03d", $newNumber), $tahun_surat, Carbon::parse($this->tanggal_mulai_tugas)->format('m'), Carbon::parse($this->tanggal_mulai_tugas)->format('d'), $bulan_surat_romawi],
                    $format_template
                );
                // Jika masih ada konflik setelah ini, error unique constraint akan muncul lagi.
                // Pertimbangkan untuk menggunakan try-catch di sekitar AssignmentLetter::create()
                // untuk menangani konflik unique constraint dengan lebih elegan.
            }
            $this->assignmentLetter->nomor_surat = $generatedNomorSurat;
        }

        $dataToSave = [
            'user_id' => Auth::id(),
            'nomor_surat' => $this->assignmentLetter->nomor_surat,
            'nama_komisioner' => $this->nama_komisioner,
            'jabatan_komisioner' => $this->jabatan_komisioner,
            'tujuan_penugasan' => $this->tujuan_penugasan,
            'tempat_tugas' => $this->tempat_tugas,
            'tanggal_mulai_tugas' => $this->tanggal_mulai_tugas,
            'tanggal_selesai_tugas' => $this->tanggal_selesai_tugas,
            'tahun' => Carbon::parse($this->tanggal_mulai_tugas)->year,
            'perihal' => $this->perihal,
            'dasar_hukum' => $this->dasar_hukum,
        ];

        try {
            if ($this->assignmentLetter->exists) {
                $this->assignmentLetter->update($dataToSave);
                Session::flash('success', 'Surat tugas berhasil diperbarui!');
            } else {
                $this->assignmentLetter = AssignmentLetter::create($dataToSave);
                Session::flash('success', 'Surat tugas berhasil dibuat!');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                Session::flash('error', 'Gagal menyimpan: Nomor surat yang digenerate sudah ada. Silakan coba lagi atau periksa riwayat.');
                $this->resetForm();
                return;
            }
            throw $e;
        }

        if ($submitAndPrint) {
            Session::flash('success', 'Surat tugas berhasil dibuat dan akan dicetak!');
            $this->dispatch('open-pdf', url: route('komisioner.surat.print_pdf', [
                'assignmentLetter' => $this->assignmentLetter->id]));
            $this->resetForm();
            return;
        } else {
            $this->resetForm();
            Session::flash('info', 'Draf surat tugas berhasil disimpan!');
            return;
        }
    }

    public function resetForm()
    {
        $this->resetValidation();
        $this->reset([
            'assignmentLetter',
            'nama_komisioner',
            'jabatan_komisioner',
            'tujuan_penugasan',
            'tempat_tugas',
            'tanggal_mulai_tugas',
            'tanggal_selesai_tugas',
            'perihal',
            'dasar_hukum',
        ]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.create-assignment-letter-form');
    }
}
