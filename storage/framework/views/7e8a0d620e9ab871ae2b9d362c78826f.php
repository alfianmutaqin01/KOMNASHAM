<!DOCTYPE html>
<html>
<head>
    <title>Surat Tugas - <?php echo e($letter->nomor_surat); ?></title>
    <style>
        body {
            font-family: 'Times New Roman';
            font-size: 12pt;
            line-height: 1.5;
            margin: 1.5cm 2cm; 
        }
        .header-kop {
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.2;
            font-weight: bold;
        }
        .header-kop h3 {
            margin: 0;
            padding: 0;
        }
        .header-kop .alamat {
            font-size: 10pt;
            font-weight: normal;
            margin-top: 5px;
        }
        .divider {
            border-bottom: 2px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .judul-surat {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .nomor-surat {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 30px;
        }
        .body-surat p {
            margin-bottom: 10px;
            text-align: justify;
            text-indent: 1cm; 
        }
        .body-surat ul {
            list-style: none;
            padding-left: 1cm;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .body-surat ul li {
            margin-bottom: 5px;
        }
        .body-surat .data-item {
            display: block;
            margin-bottom: 5px;
        }
        .body-surat .data-label {
            display: inline-block;
            width: 3cm; 
            vertical-align: top;
            font-weight: bold;
        }
        .body-surat .data-value {
            display: inline-block;
            width: calc(100% - 3cm);
            vertical-align: top;
        }
        .penutup {
            margin-top: 40px;
            text-align: justify;
            text-indent: 1cm;
        }
        .ttd-section {
            margin-top: 50px;
            text-align: right;
        }
        .ttd-section p {
            margin: 0;
        }
        .ttd-section .nama-pejabat {
            margin-top: 60px; 
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header-kop">
        <h3><?php echo e($settings['kop_surat_text']); ?></h3>
        <div class="divider"></div>
    </div>

    <div class="judul-surat">SURAT TUGAS</div>
    <div class="nomor-surat">Nomor: <?php echo e($letter->nomor_surat); ?></div>

    <div class="body-surat">
        <p>Yang bertanda tangan di bawah ini:</p>
        <ul>
            <li class="data-item"><span class="data-label">Nama:</span> <span class="data-value"><?php echo e($settings['tanda_tangan_nama']); ?></span></li>
            <li class="data-item"><span class="data-label">Jabatan:</span> <span class="data-value"><?php echo e($settings['tanda_tangan_jabatan']); ?></span></li>
        </ul>

        <p>Dengan ini menugaskan:</p>
        <ul>
            <li class="data-item"><span class="data-label">Nama:</span> <span class="data-value"><?php echo e($letter->nama_komisioner); ?></span></li>
            <li class="data-item"><span class="data-label">Jabatan:</span> <span class="data-value"><?php echo e($letter->jabatan_komisioner); ?></span></li>
        </ul>

        <p>Untuk melaksanakan tugas sebagai berikut:</p>
        <ul>
            <li class="data-item"><span class="data-label">Tujuan Penugasan:</span> <span class="data-value"><?php echo e($letter->tujuan_penugasan); ?></span></li>
            <li class="data-item"><span class="data-label">Tempat Tugas:</span> <span class="data-value"><?php echo e($letter->tempat_tugas); ?></span></li>
            <li class="data-item"><span class="data-label">Tanggal Mulai:</span> <span class="data-value"><?php echo e($letter->tanggal_mulai_tugas->translatedFormat('d F Y')); ?></span></li>
            <li class="data-item"><span class="data-label">Tanggal Selesai:</span> <span class="data-value"><?php echo e($letter->tanggal_selesai_tugas->translatedFormat('d F Y')); ?></span></li>
            <?php if($letter->perihal): ?>
                <li class="data-item"><span class="data-label">Perihal:</span> <span class="data-value"><?php echo e($letter->perihal); ?></span></li>
            <?php endif; ?>
            <?php if($letter->dasar_hukum): ?>
                <li class="data-item"><span class="data-label">Dasar Hukum:</span> <span class="data-value"><?php echo nl2br(e($letter->dasar_hukum)); ?></span></li>
            <?php endif; ?>
        </ul>

        <p class="penutup">Demikian surat tugas ini dibuat untuk dapat dilaksanakan dengan penuh tanggung jawab.</p>
    </div>

    <div class="ttd-section">
        <p>Wonosobo, <?php echo e($currentDate); ?></p>
        <p><?php echo e($settings['tanda_tangan_jabatan']); ?>,</p>
        <br><br><br><br>
        <p class="nama-pejabat"><?php echo e($settings['tanda_tangan_nama']); ?></p>
    </div>
</body>
</html><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/assignment_letters/print.blade.php ENDPATH**/ ?>