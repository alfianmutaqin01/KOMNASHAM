@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            @if (auth()->user()->hasRole('admin'))
                <div class="alert alert-primary">Anda melihat semua laporan.</div>
            @else
                <div class="alert alert-info">Anda melihat laporan yang Anda buat.</div>
            @endif
            <h5 class="mb-0">Riwayat Laporan Kegiatan</h5>
        </div>
        <div class="card-body">
            {{-- Menampilkan pesan sukses/error dari session --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @if ($activityReports->isEmpty())
                <div class="alert alert-info">Belum ada laporan kegiatan yang dibuat.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th style="width: 25%;">Nama Kegiatan</th>
                                <th style="width: 20%;">Tanggal & Waktu</th>
                                <th style="width: 20%;">Lokasi</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activityReports as $report)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $report->nama_kegiatan }}</td>
                                    <td>{{ $report->tanggal_mulai->format('d/m/Y H:i') }} -
                                        {{ $report->tanggal_selesai->format('H:i') }}</td>
                                    <td>{{ $report->lokasi_kegiatan }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge bg-{{ $report->status == 'draft' ? 'secondary' : ($report->status == 'submitted' ? 'primary' : 'success') }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('komisioner.kegiatan.print', $report) }}"
                                                class="btn btn-sm btn-outline-info" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Cetak Laporan">
                                                <i class="ph-printer"></i>
                                            </a>
                                            <a href="{{ route('komisioner.kegiatan.edit', $report) }}"
                                                class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Laporan">
                                                <i class="ph-pencil"></i>
                                            </a>
                                            <form action="{{ route('komisioner.kegiatan.destroy', $report) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan kegiatan ini? Ini tidak dapat dibatalkan!');"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus Laporan">
                                                    <i class="ph-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>
    @endpush
@endsection