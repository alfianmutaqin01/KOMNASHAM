<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Surat Tugas</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <form wire:submit.prevent="saveLetter">
                <h6 class="mb-3 text-muted">A. Informasi Komisioner Ditugaskan</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Komisioner <span class="text-danger">*</span></label>
                        <input type="text" wire:model="nama_komisioner"
                            class="form-control @error('nama_komisioner') is-invalid @enderror">
                        @error('nama_komisioner') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jabatan Komisioner <span class="text-danger">*</span></label>
                        <input type="text" wire:model="jabatan_komisioner"
                            id="jabatan_komisioner"
                            class="form-control @error('jabatan_komisioner') is-invalid @enderror">
                        @error('jabatan_komisioner') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">B. Detail Penugasan</h6>
                <div class="mb-3">
                    <label class="form-label">Tujuan Penugasan <span class="text-danger">*</span></label>
                    <textarea wire:model="tujuan_penugasan"
                        class="form-control @error('tujuan_penugasan') is-invalid @enderror" rows="5"
                        placeholder="Jelaskan secara rinci tujuan penugasan ini dibuat"></textarea>
                    @error('tujuan_penugasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Tugas <span class="text-danger">*</span></label>
                    <input type="text" wire:model="tempat_tugas"
                        class="form-control @error('tempat_tugas') is-invalid @enderror"
                        placeholder="Contoh: Kantor Bupati Wonosobo, Desa X">
                    @error('tempat_tugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai Tugas <span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_mulai_tugas"
                            class="form-control @error('tanggal_mulai_tugas') is-invalid @enderror">
                        @error('tanggal_mulai_tugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai Tugas <span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_selesai_tugas"
                            class="form-control @error('tanggal_selesai_tugas') is-invalid @enderror">
                        @error('tanggal_selesai_tugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Perihal (Opsional)</label>
                    <input type="text" wire:model="perihal" class="form-control @error('perihal') is-invalid @enderror"
                        placeholder="Contoh: Klarifikasi Laporan Pelanggaran HAM">
                    @error('perihal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Dasar Hukum (Opsional)</label>
                    <textarea wire:model="dasar_hukum" class="form-control @error('dasar_hukum') is-invalid @enderror"
                        rows="3" placeholder="Sebutkan dasar hukum penugasan jika ada"></textarea>
                    @error('dasar_hukum') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">C. Data Persuratan Umum (Baca Saja)</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Surat Terakhir:</label>
                        <input type="text" class="form-control" value="{{ $nomor_surat_terakhir_format }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teks Kop Surat:</label>
                        <textarea class="form-control" rows="3" readonly>{{ $kop_surat_text }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pejabat Penanda Tangan:</label>
                        <input type="text" class="form-control" value="{{ $tanda_tangan_nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jabatan Pejabat Penanda Tangan:</label>
                        <input type="text" class="form-control" value="{{ $tanda_tangan_jabatan }}" readonly>
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" wire:click="saveLetter(false)" class="btn btn-outline-warning me-2">Simpan
                        Draf</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan dan Cetak PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>
