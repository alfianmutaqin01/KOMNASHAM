<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Laporan Kegiatan</h5>
        </div>

        <div class="card-body">
            {{-- Menampilkan pesan sukses/info dari session --}}
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
            @error('new_lampiran.*') {{-- Pesan error untuk setiap file lampiran --}}
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <form wire:submit.prevent="saveReport">
                <h6 class="mb-3 text-muted">Identitas Pelapor</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nama Komisioner:</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jabatan Komisioner:</label>
                        <input type="text" wire:model="jabatan_komisioner" id="jabatan_komisioner"
                            class="form-control @error('jabatan_komisioner') is-invalid @enderror">
                        @error('jabatan_komisioner') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Pelaporan:</label>
                        <input type="text" class="form-control"
                            value="{{ Carbon\Carbon::now()->translatedFormat('d F Y') }}" readonly>
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">Informasi Kegiatan</h6>
                <div class="mb-3">
                    <label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" wire:model="nama_kegiatan"
                        class="form-control @error('nama_kegiatan') is-invalid @enderror"
                        placeholder="Contoh: Klarifikasi pengaduan warga di Puskesmas X">
                    @error('nama_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal dan Waktu Mulai Kegiatan <span
                                class="text-danger">*</span></label>
                        <input type="datetime-local" wire:model="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror">
                        @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal dan Waktu Selesai Kegiatan <span
                                class="text-danger">*</span></label>
                        <input type="datetime-local" wire:model="tanggal_selesai"
                            class="form-control @error('tanggal_selesai') is-invalid @enderror">
                        @error('tanggal_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" wire:model="lokasi_kegiatan"
                        class="form-control @error('lokasi_kegiatan') is-invalid @enderror"
                        placeholder="Contoh: Desa X, Kec. Y">
                    @error('lokasi_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tujuan Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="tujuan_kegiatan"
                        class="form-control @error('tujuan_kegiatan') is-invalid @enderror" rows="3"
                        placeholder="Jelaskan tujuan utama kegiatan ini dilaksanakan"></textarea>
                    @error('tujuan_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Pihak yang Terlibat</label>
                    <textarea wire:model="pihak_terlibat"
                        class="form-control @error('pihak_terlibat') is-invalid @enderror" rows="3"
                        placeholder="Sebutkan individu, kelompok, atau instansi yang berpartisipasi atau ditemui"></textarea>
                    @error('pihak_terlibat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="deskripsi_singkat"
                        class="form-control @error('deskripsi_singkat') is-invalid @enderror" rows="5"
                        placeholder="Ceritakan kronologi atau ringkasan jalannya kegiatan"></textarea>
                    @error('deskripsi_singkat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">Hasil & Tindak Lanjut</h6>
                <div class="mb-3">
                    <label class="form-label">Hasil/Output Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="hasil_kegiatan"
                        class="form-control @error('hasil_kegiatan') is-invalid @enderror" rows="5"
                        placeholder="Apa yang telah dicapai dari kegiatan ini?"></textarea>
                    @error('hasil_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tindak Lanjut/Rekomendasi</label>
                    <textarea wire:model="tindak_lanjut"
                        class="form-control @error('tindak_lanjut') is-invalid @enderror" rows="3"
                        placeholder="Langkah-langkah selanjutnya atau rekomendasi yang dihasilkan"></textarea>
                    @error('tindak_lanjut') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Permasalahan/Tantangan</label>
                    <textarea wire:model="permasalahan_tantangan"
                        class="form-control @error('permasalahan_tantangan') is-invalid @enderror" rows="3"
                        placeholder="Hambatan atau kendala yang dihadapi selama kegiatan"></textarea>
                    @error('permasalahan_tantangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">Lampiran (Opsional)</h6>
                <div class="mb-3">
                    <label for="lampiran" class="form-label">Unggah Lampiran</label>
                    <input type="file" wire:model="new_lampiran" id="new_lampiran" multiple
                        class="form-control @error('new_lampiran.*') is-invalid @enderror">
                    @if ($new_lampiran)
                        <div class="mt-2">
                            <p class="text-muted">File baru yang akan diunggah:</p>
                            <ul>
                                @foreach ($new_lampiran as $file)
                                    <li>{{ $file->getClientOriginalName() }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @error('new_lampiran.*') <div class="invalid-feedback">{{ $message }}</div> @enderror

                    @if (!empty($existing_lampiran))
                        <div class="mt-3">
                            <label class="form-label">Lampiran Saat Ini:</label>
                            <ul class="list-group">
                                @foreach ($existing_lampiran as $index => $path)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="ph-file me-2"></i> {{ basename($path) }}</span>
                                        <button type="button" wire:click="removeLampiran({{ $index }})"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="ph-x"></i> Hapus
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="text-end">
                    <button type="button" wire:click="saveReport(false)" class="btn btn-outline-warning me-2">Simpan
                        Draf</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan dan Cetak PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>