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
            <td>{{ $activityReport->user->name }}</td>
        </tr>
        <tr>
            <td>Jabatan:</td>
            <td>{{ $activityReport->jabatan_komisioner ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Tanggal Pelaporan:</td>
            <td>{{ $activityReport->created_at->translatedFormat('d F Y H:i') }}</td>
        </tr>
    </table>

    <div class="section-title">B. Informasi Kegiatan</div>
    <table>
        <tr>
            <td>Nama Kegiatan:</td>
            <td>{{ $activityReport->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tanggal & Waktu Kegiatan:</td>
            <td>{{ $activityReport->tanggal_mulai->translatedFormat('d F Y H:i') }} -
                {{ $activityReport->tanggal_selesai->translatedFormat('d F Y H:i') }}</td>
        </tr>
        <tr>
            <td>Lokasi Kegiatan:</td>
            <td>{{ $activityReport->lokasi_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tujuan Kegiatan:</td>
            <td>{!! nl2br(e($activityReport->tujuan_kegiatan)) !!}</td>
        </tr>
        <tr>
            <td>Pihak yang Terlibat:</td>
            <td>{!! nl2br(e($activityReport->pihak_terlibat)) !!}</td>
        </tr>
        <tr>
            <td>Deskripsi Singkat Kegiatan:</td>
            <td>{!! nl2br(e($activityReport->deskripsi_singkat)) !!}</td>
        </tr>
    </table>

    <div class="section-title">C. Hasil & Tindak Lanjut</div>
    <table>
        <tr>
            <td>Hasil/Output Kegiatan:</td>
            <td>{!! nl2br(e($activityReport->hasil_kegiatan)) !!}</td>
        </tr>
        <tr>
            <td>Tindak Lanjut/Rekomendasi:</td>
            <td>{!! nl2br(e($activityReport->tindak_lanjut)) !!}</td>
        </tr>
        <tr>
            <td>Permasalahan/Tantangan:</td>
            <td>{!! nl2br(e($activityReport->permasalahan_tantangan)) !!}</td>
        </tr>
    </table>

    @if (!empty($activityReport->lampiran))
        <div class="section-title">D. Lampiran</div>
        <ul>
            @foreach ($activityReport->lampiran as $lampiran_path)
                <li><a href="{{ Storage::url($lampiran_path) }}" target="_blank">{{ basename($lampiran_path) }}</a></li>
            @endforeach
        </ul>
    @endif

    <div class="footer">
        <p>Demikian laporan kegiatan ini disusun sebagai bentuk tanggung jawab.</p>
        <p>Wonosobo, {{ $currentDate }}</p>
        <br><br><br>
        <div style="text-align: center;">
            <h3>Tim Sidak</h3>
            <p>Komisi Kabupaten Wonosobo Ramah HAM</p>
        </div>
    </div>
</body>

</html>