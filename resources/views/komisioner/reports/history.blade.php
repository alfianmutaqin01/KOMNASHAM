@extends('dashboard') {{-- Memberi tahu Blade untuk menggunakan dashboard.blade.php sebagai layout --}}

@section('content') {{-- Mendefinisikan konten untuk section 'content' --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Laporan Sidak</h5>
        </div>
        <div class="card-body">
            @if ($reports->isEmpty())
                <div class="alert alert-info">Belum ada laporan yang dibuat.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Sidak</th>
                                <th>Lokasi</th>
                                <th>Instansi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $report->tanggal_sidak->format('d/m/Y') }}</td>
                                    <td>{{ $report->lokasi }}</td>
                                    <td>{{ $report->instansi_dikunjungi }}</td>
                                    <td><span class="badge bg-{{ $report->status == 'draft' ? 'secondary' : ($report->status == 'submitted' ? 'primary' : 'success') }}">{{ ucfirst($report->status) }}</span></td>
                                    <td>
                                        <a href="{{ route('reports.print', $report) }}" class="btn btn-sm btn-info" target="_blank">Cetak</a>
                                        {{-- Tambahkan link untuk edit jika diperlukan --}}
                                        {{-- <a href="#" class="btn btn-sm btn-warning">Edit</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection