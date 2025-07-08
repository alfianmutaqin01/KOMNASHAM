<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\ActivityReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CreateActivityReportForm extends Component
{
    use WithFileUploads; 
    public ActivityReport $activityReport; 

    public $jabatan_komisioner;
    public $nama_kegiatan;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $lokasi_kegiatan;
    public $tujuan_kegiatan;
    public $pihak_terlibat;
    public $deskripsi_singkat;
    public $hasil_kegiatan;
    public $tindak_lanjut;
    public $permasalahan_tantangan;
    public $new_lampiran = []; // Untuk file yang akan diunggah
    public $existing_lampiran = []; // Untuk menampilkan lampiran yang sudah ada (edit mode)

    // Aturan validasi
    protected $rules = [
        'jabatan_komisioner' => 'required|string|max:255',
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
        'new_lampiran.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:5120', // Maks 5MB per file
    ];

    // Pesan validasi kustom (Opsional, tapi direkomendasikan)
    protected $messages = [
        'jabatan_komisioner.required' => 'Jabatan komisioner wajib diisi.',
        'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
        'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
        'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
        'lokasi_kegiatan.required' => 'Lokasi kegiatan wajib diisi.',
        'tujuan_kegiatan.required' => 'Tujuan kegiatan wajib diisi.',
        'deskripsi_singkat.required' => 'Deskripsi singkat kegiatan wajib diisi.',
        'hasil_kegiatan.required' => 'Hasil/output kegiatan wajib diisi.',
        'new_lampiran.*.mimes' => 'Format lampiran tidak didukung (PDF, JPG, PNG, DOCX, XLSX).',
        'new_lampiran.*.max' => 'Ukuran lampiran maksimal 5MB.',
    ];

    public function mount(?ActivityReport $activityReport = null)
    {
        if ($activityReport && $activityReport->exists) {
            $this->activityReport = $activityReport;
            $this->fill($activityReport->toArray());
            // Pastikan format tanggal sesuai input HTML
            $this->jabatan_komisioner = $activityReport->jabatan_komisioner;
            $this->tanggal_mulai = $this->activityReport->tanggal_mulai->format('Y-m-d\TH:i'); // HTML datetime-local
            $this->tanggal_selesai = $this->activityReport->tanggal_selesai->format('Y-m-d\TH:i'); // HTML datetime-local
            $this->existing_lampiran = $this->activityReport->lampiran ?? [];
        } else {
            $this->activityReport = new ActivityReport();
            $this->tanggal_mulai = Carbon::now()->format('Y-m-d\TH:i');
            $this->tanggal_selesai = Carbon::now()->format('Y-m-d\TH:i');
        }
    }

    // Metode untuk menyimpan atau memperbarui laporan
    public function saveReport($submitAndPrint = false)
    {
        $this->validate();

        // Handle file uploads
        $uploadedFilePaths = [];
        if (!empty($this->new_lampiran)) {
            foreach ($this->new_lampiran as $file) {
                $uploadedFilePaths[] = $file->store('public/activity_reports'); // Simpan file di storage
            }
        }

        $data = [
            'jabatan_komisioner' => $this->jabatan_komisioner,
            'nama_kegiatan' => $this->nama_kegiatan,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'tujuan_kegiatan' => $this->tujuan_kegiatan,
            'pihak_terlibat' => $this->pihak_terlibat,
            'deskripsi_singkat' => $this->deskripsi_singkat,
            'hasil_kegiatan' => $this->hasil_kegiatan,
            'tindak_lanjut' => $this->tindak_lanjut,
            'permasalahan_tantangan' => $this->permasalahan_tantangan,
            'lampiran' => array_merge($this->existing_lampiran, $uploadedFilePaths),
        ];

        if ($this->activityReport->exists) {
            $this->activityReport->update($data);
            Session::flash('success', 'Laporan kegiatan berhasil diperbarui!');
        } else {
            $data['user_id'] = auth()->id();
            $data['status'] = 'submitted'; // Default status
            $this->activityReport = ActivityReport::create($data); // Assign hasil create ke properti
            Session::flash('success', 'Laporan kegiatan berhasil disimpan!');
        }

        // Logika pengalihan/aksi setelah menyimpan
        if ($submitAndPrint) {
            Session::flash('success', 'Laporan kegiatan berhasil disimpan dan PDF akan dicetak!');
            $this->dispatch('open-pdf', url: route('komisioner.kegiatan.print', ['activityReport' => $this->activityReport->id]));
            $this->resetForm();
            return;
        } else {
            $this->resetForm();
            Session::flash('info', 'Draf laporan kegiatan berhasil disimpan!');
            return;
        }
    }

    // Metode untuk menghapus lampiran individual (opsional, tapi berguna)
    public function removeLampiran($index)
    {
        array_splice($this->existing_lampiran, $index, 1);
        $this->activityReport->update(['lampiran' => $this->existing_lampiran]);
        Session::flash('info', 'Lampiran berhasil dihapus!');
    }

    // Metode untuk mereset properti form
    public function resetForm()
    {
        $this->resetValidation();
        $this->reset([
            'activityReport', // Reset objek model juga
            'nama_kegiatan',
            'tanggal_mulai',
            'tanggal_selesai',
            'lokasi_kegiatan',
            'tujuan_kegiatan',
            'pihak_terlibat',
            'deskripsi_singkat',
            'hasil_kegiatan',
            'tindak_lanjut',
            'permasalahan_tantangan',
            'new_lampiran',
            'existing_lampiran',
        ]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.create-activity-report-form');
    }
}