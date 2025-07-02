{{-- File: resources/views/livewire/create-report-form.blade.php --}}
<div>
    <h1>DEBUG: FORM LIVEWIRE MUNCUL!</h1>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Laporan Hasil Sidak</h5>
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


            <form wire:submit.prevent="saveReport">
                <h6 class="mb-3 text-muted">A. Informasi Umum</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Sidak <span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_sidak"
                            class="form-control @error('tanggal_sidak') is-invalid @enderror">
                        @error('tanggal_sidak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" wire:model="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror"
                            placeholder="Contoh: Kantor Kecamatan Wonosobo">
                        @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Instansi/Lembaga yang Dikunjungi <span
                                class="text-danger">*</span></label>
                        <input type="text" wire:model="instansi_dikunjungi"
                            class="form-control @error('instansi_dikunjungi') is-invalid @enderror"
                            placeholder="Contoh: Puskesmas Wonosobo 1">
                        @error('instansi_dikunjungi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Layanan yang Diamati</label>
                        <input type="text" wire:model="jenis_layanan_diamati"
                            class="form-control @error('jenis_layanan_diamati') is-invalid @enderror"
                            placeholder="Contoh: Pelayanan Kesehatan Ibu dan Anak">
                        @error('jenis_layanan_diamati') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tim Pelaksana Sidak</label>
                    <textarea wire:model="tim_pelaksana"
                        class="form-control @error('tim_pelaksana') is-invalid @enderror" rows="3"
                        placeholder="Sebutkan nama-nama tim pelaksana"></textarea>
                    @error('tim_pelaksana') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">C. Metodologi Pemantauan</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wawancara dengan Pengguna Layanan (orang)</label>
                        <input type="number" wire:model="jumlah_wawancara_pengguna"
                            class="form-control @error('jumlah_wawancara_pengguna') is-invalid @enderror" min="0">
                        @error('jumlah_wawancara_pengguna') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wawancara dengan Petugas Layanan (orang)</label>
                        <input type="number" wire:model="jumlah_wawancara_petugas"
                            class="form-control @error('jumlah_wawancara_petugas') is-invalid @enderror" min="0">
                        @error('jumlah_wawancara_petugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">D. Temuan Lapangan</h6>

                <div class="mb-3">
                    <label class="form-label fw-semibold">1. Aksesibilitas</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="aksesibilitas_difabel_tersedia"
                            id="aksesibilitas_difabel_tersedia">
                        <label class="form-check-label" for="aksesibilitas_difabel_tersedia">
                            Tersedia fasilitas untuk difabel
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="area_pelayanan_mudah_dijangkau"
                            id="area_pelayanan_mudah_dijangkau">
                        <label class="form-check-label" for="area_pelayanan_mudah_dijangkau">
                            Area pelayanan mudah dijangkau
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_aksesibilitas"
                            class="form-control @error('temuan_khusus_aksesibilitas') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_aksesibilitas') <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">2. Non-Diskriminasi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="tidak_ditemukan_diskriminasi"
                            id="tidak_ditemukan_diskriminasi">
                        <label class="form-check-label" for="tidak_ditemukan_diskriminasi">
                            Tidak ditemukan perlakuan diskriminatif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="petugas_melayani_semua"
                            id="petugas_melayani_semua">
                        <label class="form-check-label" for="petugas_melayani_semua">
                            Petugas melayani semua warga tanpa membedakan
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_non_diskriminasi"
                            class="form-control @error('temuan_khusus_non_diskriminasi') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_non_diskriminasi') <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">3. Transparansi & Informasi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="informasi_layanan_jelas"
                            id="informasi_layanan_jelas">
                        <label class="form-check-label" for="informasi_layanan_jelas">
                            Informasi layanan ditampilkan secara jelas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="biaya_prosedur_dapat_diakses"
                            id="biaya_prosedur_dapat_diakses">
                        <label class="form-check-label" for="biaya_prosedur_dapat_diakses">
                            Biaya dan prosedur dapat diakses publik
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_transparansi"
                            class="form-control @error('temuan_khusus_transparansi') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_transparansi') <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">4. Kualitas dan Kecepatan Pelayanan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="layanan_sesuai_prosedur"
                            id="layanan_sesuai_prosedur">
                        <label class="form-check-label" for="layanan_sesuai_prosedur">
                            Layanan berjalan sesuai prosedur
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="waktu_tunggu_relatif_cepat"
                            id="waktu_tunggu_relatif_cepat">
                        <label class="form-check-label" for="waktu_tunggu_relatif_cepat">
                            Waktu tunggu relatif cepat
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_kualitas"
                            class="form-control @error('temuan_khusus_kualitas') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_kualitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">5. Perlakuan terhadap Pengguna Layanan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="petugas_bersikap_ramah"
                            id="petugas_bersikap_ramah">
                        <label class="form-check-label" for="petugas_bersikap_ramah">
                            Petugas bersikap ramah dan tidak merendahkan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="tidak_ditemukan_intimidasi"
                            id="tidak_ditemukan_intimidasi">
                        <label class="form-check-label" for="tidak_ditemukan_intimidasi">
                            Tidak ditemukan intimidasi/verbal abuse
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_perlakuan"
                            class="form-control @error('temuan_khusus_perlakuan') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_perlakuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">6. Mekanisme Pengaduan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="tersedia_sarana_aduan"
                            id="tersedia_sarana_aduan">
                        <label class="form-check-label" for="tersedia_sarana_aduan">
                            Tersedia sarana aduan (kotak, hotline, aplikasi)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="warga_mengetahui_cara_aduan"
                            id="warga_mengetahui_cara_aduan">
                        <label class="form-check-label" for="warga_mengetahui_cara_aduan">
                            Warga mengetahui cara menyampaikan keluhan
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Temuan khusus:</label>
                        <textarea wire:model="temuan_khusus_mekanisme_pengaduan"
                            class="form-control @error('temuan_khusus_mekanisme_pengaduan') is-invalid @enderror"
                            rows="2"></textarea>
                        @error('temuan_khusus_mekanisme_pengaduan') <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">E. Analisis Umum</h6>
                <div class="mb-3">
                    <textarea wire:model="analisis_umum"
                        class="form-control @error('analisis_umum') is-invalid @enderror" rows="5"
                        placeholder="Deskripsikan temuan secara ringkas namun analitis"></textarea>
                    @error('analisis_umum') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h6 class="mt-4 mb-3 text-muted">F. Rekomendasi</h6>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="rekomendasi_papan_informasi"
                            id="rekomendasi_papan_informasi">
                        <label class="form-check-label" for="rekomendasi_papan_informasi">
                            Memasang papan informasi layanan di ruang tunggu dan pintu masuk utama.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="rekomendasi_kursi_roda"
                            id="rekomendasi_kursi_roda">
                        <label class="form-check-label" for="rekomendasi_kursi_roda">
                            Menyediakan kursi roda dan jalur landai untuk difabel.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="rekomendasi_pelatihan_petugas"
                            id="rekomendasi_pelatihan_petugas">
                        <label class="form-check-label" for="rekomendasi_pelatihan_petugas">
                            Melatih petugas pelayanan publik dalam prinsip pelayanan ramah HAM.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="rekomendasi_sistem_pengaduan"
                            id="rekomendasi_sistem_pengaduan">
                        <label class="form-check-label" for="rekomendasi_sistem_pengaduan">
                            Membentuk dan menyosialisasikan sistem pengaduan warga berbasis HAM.
                        </label>
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" wire:click="saveReport(false)" class="btn btn-outline-warning">Simpan
                        Draft</button>
                    <button type="button" wire:click="saveReport(true)" class="btn btn-outline-primary">Simpan dan Cetak
                        PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:navigated', function () {
        window.addEventListener('open-pdf', event => {
            if (event.detail.url) {
                window.open(event.detail.url, '_blank');
            }
        });
    });
</script>