<!DOCTYPE html>
<html>

<head>
    <title>Surat Tugas - <?php echo e($letter->nomor_surat); ?></title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm 2cm;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 11.5pt;
            line-height: 1.5;
            margin: 0;
        }

        .header-kop {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .header-kop h3 {
            margin: 0;
            font-size: 12pt;
            text-transform: uppercase;
        }

        .divider {
            border-bottom: 2px solid black;
            margin: 5px 0 12px;
        }

        .judul-surat {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 4px;
        }

        .nomor-surat {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 20px;
        }

        .body-surat p {
            margin: 10px 0 6px;
            text-align: justify;
            text-indent: 1.2cm;
        }

        .data-list {
            list-style: none;
            padding-left: 1.2cm;
            margin: 0 0 10px 0;
        }

        .data-list li {
            margin-bottom: 5px;
        }

        .label {
            display: inline-block;
            width: 3.5cm;
            font-weight: bold;
        }

        .value {
            display: inline-block;
            width: auto;
        }

        .penutup {
            margin-top: 20px;
            text-align: justify;
            text-indent: 1.2cm;
        }

        .ttd-section {
            margin-top: 40px;
            text-align: right;
        }

        .ttd-section p {
            margin: 3px 0;
        }

        .ttd-section .nama-pejabat {
            margin-top: 50px;
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
        <ul class="data-list">
            <li><span class="label">Nama</span>: <span class="value"><?php echo e($settings['tanda_tangan_nama']); ?></span></li>
            <li><span class="label">Jabatan</span>: <span class="value"><?php echo e($settings['tanda_tangan_jabatan']); ?></span></li>
        </ul>

        <p>Dengan ini menugaskan:</p>
        <ul class="data-list">
            <li><span class="label">Nama</span>: <span class="value"><?php echo e($letter->nama_komisioner); ?></span></li>
            <li><span class="label">Jabatan</span>: <span class="value"><?php echo e($letter->jabatan_komisioner); ?></span></li>
        </ul>

        <p>Untuk melaksanakan tugas sebagai berikut:</p>
        <ul class="data-list">
            <li><span class="label">Tujuan</span>: <span class="value"><?php echo e($letter->tujuan_penugasan); ?></span></li>
            <li><span class="label">Tempat</span>: <span class="value"><?php echo e($letter->tempat_tugas); ?></span></li>
            <li><span class="label">Tanggal Mulai</span>: <span class="value"><?php echo e($letter->tanggal_mulai_tugas->translatedFormat('d F Y')); ?></span></li>
            <li><span class="label">Tanggal Selesai</span>: <span class="value"><?php echo e($letter->tanggal_selesai_tugas->translatedFormat('d F Y')); ?></span></li>
            <?php if($letter->perihal): ?>
                <li><span class="label">Perihal</span>: <span class="value"><?php echo e($letter->perihal); ?></span></li>
            <?php endif; ?>
            <?php if($letter->dasar_hukum): ?>
                <li><span class="label">Dasar Hukum</span>: <span class="value"><?php echo nl2br(e($letter->dasar_hukum)); ?></span></li>
            <?php endif; ?>
        </ul>

        <p class="penutup">Demikian surat tugas ini dibuat untuk dapat dilaksanakan dengan penuh tanggung jawab.</p>
    </div>

    <div class="ttd-section">
        <p>Wonosobo, <?php echo e($currentDate); ?></p>
        <p><?php echo e($settings['tanda_tangan_jabatan']); ?>,</p>
        <p class="nama-pejabat"><?php echo e($settings['tanda_tangan_nama']); ?></p>
    </div>
</body>

</html>
<?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/assignment_letters/print.blade.php ENDPATH**/ ?>