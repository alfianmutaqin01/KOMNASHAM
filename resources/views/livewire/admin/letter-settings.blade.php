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
                    <label for="nomor_surat_terakhir" class="form-label">Nomor Surat Terakhir</label>
                    <input type="text" wire:model="nomor_surat_terakhir" id="nomor_surat_terakhir" class="form-control @error('nomor_surat_terakhir') is-invalid @enderror">
                    @error('nomor_surat_terakhir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="kop_surat_text" class="form-label">Teks Kop Surat</label>
                    <textarea wire:model="kop_surat_text" id="kop_surat_text" class="form-control @error('kop_surat_text') is-invalid @enderror" rows="3"></textarea>
                    @error('kop_surat_text') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_nama" class="form-label">Nama Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_nama" id="tanda_tangan_nama" class="form-control @error('tanda_tangan_nama') is-invalid @enderror">
                    @error('tanda_tangan_nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_jabatan" class="form-label">Jabatan Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_jabatan" id="tanda_tangan_jabatan" class="form-control @error('tanda_tangan_jabatan') is-invalid @enderror">
                    @error('tanda_tangan_jabatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</div>