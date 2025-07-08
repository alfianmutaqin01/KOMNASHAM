<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pengaturan Umum Surat Tugas</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form wire:submit.prevent="saveSettings">
                <div class="mb-3">
                    <label for="nomor_surat_terakhir_format" class="form-label">Format Nomor Surat</label>
                    <input type="text" wire:model="nomor_surat_terakhir_format" id="nomor_surat_terakhir_format"
                        class="form-control @error('nomor_surat_terakhir_format') is-invalid @enderror"
                        placeholder="Contoh: 000/SK/KOMDAHAM/VII/YYYY">
                    @error('nomor_surat_terakhir_format') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="kop_surat_text" class="form-label">Teks Kop Surat</label>
                    <textarea wire:model="kop_surat_text" id="kop_surat_text"
                        class="form-control @error('kop_surat_text') is-invalid @enderror" rows="3"></textarea>
                    @error('kop_surat_text') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_nama" class="form-label">Nama Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_nama" id="tanda_tangan_nama"
                        class="form-control @error('tanda_tangan_nama') is-invalid @enderror">
                    @error('tanda_tangan_nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_jabatan" class="form-label">Jabatan Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_jabatan" id="tanda_tangan_jabatan"
                        class="form-control @error('tanda_tangan_jabatan') is-invalid @enderror">
                    @error('tanda_tangan_jabatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">Statistik Surat Tugas</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Total Surat Tugas Tahun Ini
                            ({{ Carbon\Carbon::now()->year }}):</label>
                        <input type="text" class="form-control" value="{{ $totalSuratTahunIni }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Total Surat Tugas Keseluruhan:</label>
                        <input type="text" class="form-control" value="{{ $totalSuratKeseluruhan }}" readonly>
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">Visualisasi Jumlah Surat Per Tahun</h6>
                @if ($yearlyLetterCounts->isEmpty())
                    <p class="text-muted">Belum ada data surat tugas yang dibuat.</p>
                @else
                    <ul class="list-group mb-3">
                        @foreach ($yearlyLetterCounts as $yearData)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tahun {{ $yearData->tahun }}:
                                <span class="badge bg-primary rounded-pill">{{ $yearData->total }} Surat</span>
                            </li>
                        @endforeach
                    </ul>
                @endif


                <div class="text-end">
                    <button type="submit" class="btn btn-outline-primary">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</div>