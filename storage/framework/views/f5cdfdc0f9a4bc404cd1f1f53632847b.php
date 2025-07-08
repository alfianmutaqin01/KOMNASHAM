<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kegiatan - Komnas HAM</title>
    <style>
        body {
            font-family: 'Inter', 'Times New Roman';
            font-size: 10pt;
            line-height: 1.5;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h3 {
            font-size: 14pt;
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
            margin-bottom: 10px;
        }

        ul li {
            margin-bottom: 5px;
        }

        .item-label {
            font-weight: bold;
            width: 25%;
            /* Sesuaikan lebar label */
            display: inline-block;
            vertical-align: top;
        }

        .item-value {
            width: 70%;
            /* Sisa lebar */
            display: inline-block;
            vertical-align: top;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .footer p {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table td {
            padding: 5px;
            vertical-align: top;
            border: 1px solid #ddd;
        }

        table td:first-child {
            width: 30%;
            /* Lebar untuk label di tabel */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>LAPORAN KEGIATAN</h3>
        <h3>Komisi Kabupaten Wonosobo Ramah HAM</h3>
        <h3>Periode Kegiatan</h3>
    </div>

    <div class="section-title">A. Identitas Pelapor</div>
    <table>
        <tr>
            <td>Nama Komisioner:</td>
            <td><?php echo e($activityReport->user->name); ?></td>
        </tr>
        <tr>
            <td>Jabatan:</td>
            <td><?php echo e($activityReport->jabatan_komisioner ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <td>Tanggal Pelaporan:</td>
            <td><?php echo e($activityReport->created_at->translatedFormat('d F Y H:i')); ?></td>
        </tr>
    </table>

    <div class="section-title">B. Informasi Kegiatan</div>
    <table>
        <tr>
            <td>Nama Kegiatan:</td>
            <td><?php echo e($activityReport->nama_kegiatan); ?></td>
        </tr>
        <tr>
            <td>Tanggal & Waktu Kegiatan:</td>
            <td><?php echo e($activityReport->tanggal_mulai->translatedFormat('d F Y H:i')); ?> -
                <?php echo e($activityReport->tanggal_selesai->translatedFormat('d F Y H:i')); ?></td>
        </tr>
        <tr>
            <td>Lokasi Kegiatan:</td>
            <td><?php echo e($activityReport->lokasi_kegiatan); ?></td>
        </tr>
        <tr>
            <td>Tujuan Kegiatan:</td>
            <td><?php echo nl2br(e($activityReport->tujuan_kegiatan)); ?></td>
        </tr>
        <tr>
            <td>Pihak yang Terlibat:</td>
            <td><?php echo nl2br(e($activityReport->pihak_terlibat)); ?></td>
        </tr>
        <tr>
            <td>Deskripsi Singkat Kegiatan:</td>
            <td><?php echo nl2br(e($activityReport->deskripsi_singkat)); ?></td>
        </tr>
    </table>

    <div class="section-title">C. Hasil & Tindak Lanjut</div>
    <table>
        <tr>
            <td>Hasil/Output Kegiatan:</td>
            <td><?php echo nl2br(e($activityReport->hasil_kegiatan)); ?></td>
        </tr>
        <tr>
            <td>Tindak Lanjut/Rekomendasi:</td>
            <td><?php echo nl2br(e($activityReport->tindak_lanjut)); ?></td>
        </tr>
        <tr>
            <td>Permasalahan/Tantangan:</td>
            <td><?php echo nl2br(e($activityReport->permasalahan_tantangan)); ?></td>
        </tr>
    </table>

    <?php if(!empty($activityReport->lampiran)): ?>
        <div class="section-title">D. Lampiran</div>
        <ul>
            <?php $__currentLoopData = $activityReport->lampiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lampiran_path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(Storage::url($lampiran_path)); ?>" target="_blank"><?php echo e(basename($lampiran_path)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <div class="footer">
        <p>Demikian laporan kegiatan ini disusun sebagai bentuk tanggung jawab.</p>
        <p>Wonosobo, <?php echo e($currentDate); ?></p>
        <br><br><br>
        <div style="text-align: center;">
            <h3>Tim Sidak</h3>
            <p>Komisi Kabupaten Wonosobo Ramah HAM</p>
        </div>
    </div>
</body>

</html><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/activity_reports/pdf.blade.php ENDPATH**/ ?>