<!DOCTYPE html>
<html>

<head>
    <title>Laporan Hasil Sidak - Komnas HAM</title>
    <style>
        body {
            font-family: 'Inter', 'Times New Roman';
            /* Menggunakan font Inter */
            font-size: 10pt;
            line-height: 1.5;
            color: #333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18pt;
            margin-bottom: 5px;
        }

        .section-title {
            font-size: 12pt;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        .item-label {
            font-weight: bold;
        }

        .content-text {
            display: inline-block;
            vertical-align: top;
        }

        .checkbox-item {
            margin-bottom: 5px;
        }

        .checkbox-label {
            margin-left: 5px;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .footer p {
            margin-bottom: 5px;
        }

        .signature {
            margin-top: 60px;
        }

        .signature p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        table td {
            padding: 5px;
            vertical-align: top;
        }

        table td:first-child {
            width: 30%;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>LAPORAN HASIL SIDAK</h3>
        <h3>Komisi Kabupaten Wonosobo Ramah HAM</h3>
        <h3>Tentang Pelayanan Publik Ramah HAM</h3>
        <h3><i>(Kantor Pemerintah / Rumah Sakit / Puskesmas)</i></h3>
    </div>

    <div class="section-title">A. Informasi Umum</div>
    <table border="1">
        <tr>
            <td class="item-label">Tanggal Sidak:</td>
            <td><?php echo e($report->tanggal_sidak->translatedFormat('d F Y')); ?></td>
        </tr>
        <tr>
            <td class="item-label">Lokasi:</td>
            <td><?php echo e($report->lokasi); ?></td>
        </tr>
        <tr>
            <td class="item-label">Instansi/Lembaga yang Dikunjungi:</td>
            <td><?php echo e($report->instansi_dikunjungi); ?></td>
        </tr>
        <tr>
            <td class="item-label">Tim Pelaksana Sidak:</td>
            <td><?php echo nl2br(e($report->tim_pelaksana)); ?></td>
        </tr>
        <tr>
            <td class="item-label">Jenis Layanan yang Diamati:</td>
            <td><?php echo e($report->jenis_layanan_diamati); ?></td>
        </tr>
    </table>

    <div class="section-title">B. Tujuan dan Dasar Pelaksanaan</div>
    <ul>
        <li>Menilai dan memastikan pelayanan publik telah memenuhi prinsip-prinsip Hak Asasi Manusia. </li>
        <li>Berdasarkan mandat:</li>
        <ol>
            <li>Peraturan Daerah No. 5 tahun 2016 tentang kabupaten wonosobo ramah hak asasi manusia </li>
            <li>Peraturan Bupati Wonosobo Nomor 67 Tahun 2022 tentang Perubahan Atas Peraturan Bupati Wonosobo Nomor 42
                Tahun 2018 tentang Komisi Kabupaten Wonosobo Ramah Hak Asasi Manusia Perlu menetapkan keanggotaan Komisi
                Kabupaten Wonosobo Ramah Hak Asasi Manusia </li>
            <li>Keputusan bupati Wonosobo nomor : 300.01.06/172/2025 Tentang penetapan keanggotaan Komisi Kabupaten
                Wonosobo Ramah Hak Asasi Manusia </li>
            <li>Perintah Langsung pada tanggal 12 juni 2025 untuk melakukan Sidak atas kinerja peramgkat daerah </li>
        </ol>
    </ul>

    <div class="section-title">C. Metodologi Pemantauan</div>
    <ul>
        <li>Observasi langsung</li>
        <li>Wawancara dengan pengguna layanan (jumlah: <?php echo e($report->jumlah_wawancara_pengguna); ?> orang) </li>
        <li>Wawancara dengan petugas layanan (jumlah: <?php echo e($report->jumlah_wawancara_petugas); ?> orang) </li>
        <li>Pemeriksaan dokumen pendukung (SOP, atau lainnya) </li>
        <li>Penggunaan instrumen pemantauan pelayanan publik ramah HAM </li>
    </ul>

    <div class="section-title">D. Temuan Lapangan</div>
    <p class="fw-semibold">1. Aksesibilitas</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->aksesibilitas_difabel_tersedia): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Tersedia fasilitas untuk difabel</span>
        </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->area_pelayanan_mudah_dijangkau): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Area pelayanan mudah dijangkau</span>
        </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_aksesibilitas)); ?> </li>
    </ul>

    <p class="fw-semibold">2. Non-Diskriminasi</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->tidak_ditemukan_diskriminasi): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Tidak ditemukan perlakuan diskriminatif</span>
        </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->petugas_melayani_semua): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Petugas melayani semua warga tanpa membedakan</span> </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_non_diskriminasi)); ?> </li>
    </ul>

    <p class="fw-semibold">3. Transparansi & Informasi</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->informasi_layanan_jelas): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Informasi layanan ditampilkan secara jelas</span> </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->biaya_prosedur_dapat_diakses): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Biaya dan prosedur dapat diakses publik</span>
        </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_transparansi)); ?> </li>
    </ul>

    <p class="fw-semibold">4. Kualitas dan Kecepatan Pelayanan</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->layanan_sesuai_prosedur): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Layanan berjalan sesuai prosedur</span> </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->waktu_tunggu_relatif_cepat): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Waktu tunggu relatif cepat</span> </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_kualitas)); ?> </li>
    </ul>

    <p class="fw-semibold">5. Perlakuan terhadap Pengguna Layanan</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->petugas_bersikap_ramah): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Petugas bersikap ramah dan tidak merendahkan</span> </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->tidak_ditemukan_intimidasi): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Tidak ditemukan intimidasi/verbal abuse</span> </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_perlakuan)); ?> </li>
    </ul>

    <p class="fw-semibold">6. Mekanisme Pengaduan</p>
    <ul>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->tersedia_sarana_aduan): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Tersedia sarana aduan (kotak, hotline, aplikasi)</span> </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->warga_mengetahui_cara_aduan): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Warga mengetahui cara menyampaikan keluhan</span> </li>
        <li>Temuan khusus: <?php echo nl2br(e($report->temuan_khusus_mekanisme_pengaduan)); ?> </li>
    </ul>

    <div class="section-title">E. Analisis Umum</div>
    <p><?php echo nl2br(e($report->analisis_umum)); ?></p>

    <div class="section-title">F. Rekomendasi</div>
    <ol>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->rekomendasi_papan_informasi): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Memasang papan informasi layanan di ruang tunggu dan pintu masuk utama.</span>
        </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->rekomendasi_kursi_roda): ?> checked <?php endif; ?>> <span
                class="checkbox-label">Menyediakan kursi roda dan jalur landai untuk difabel.</span> </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->rekomendasi_pelatihan_petugas): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Melatih petugas pelayanan publik dalam prinsip pelayanan ramah HAM.</span>
        </li>
        <li class="checkbox-item"><input type="checkbox" <?php if($report->rekomendasi_sistem_pengaduan): ?> checked <?php endif; ?>>
            <span class="checkbox-label">Membentuk dan menyosialisasikan sistem pengaduan warga berbasis HAM.</span>
        </li>
    </ol>

    <div class="section-title">G. Penutup</div>
    <p style="text-align: left;">Demikian laporan ini disusun sebagai bentuk tanggung jawab pemantauan pelayanan
        publik yang menjunjung tinggi
        nilai-nilai Hak Asasi Manusia di Kabupaten Wonosobo.</p>
    <div class="footer">
        <p>Wonosobo, <?php echo e($currentDate); ?></p>
        <br><br><br>
        <div style="text-align: center;">
            <h3>Tim Sidak</h3>
            <p>Komisi Kabupaten Wonosobo Ramah HAM</p>
        </div>

    </div>
</body>

</html><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/reports/pdf.blade.php ENDPATH**/ ?>