@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            @if (auth()->user()->hasRole('admin'))
                <div class="alert alert-primary">Anda melihat semua laporan.</div>
            @else
                <div class="alert alert-info">Anda melihat laporan yang Anda buat.</div>
            @endif
            <h5 class="mb-0">Riwayat Laporan Sidak</h5>
        </div>
        <div class="card-body">
            {{-- Menampilkan pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($reports->isEmpty())
                <div class="alert alert-info">Belum ada laporan yang dibuat.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th style="width: 15%;">Tanggal Sidak</th>
                                <th style="width: 25%;">Lokasi</th>
                                <th style="width: 30%;">Instansi</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $index => $report)
                                <tr>
                                    <td class="text-center">
                                        {{ ($reports->currentPage() - 1) * $reports->perPage() + $index + 1 }}
                                    </td>
                                    <td>{{ $report->tanggal_sidak->format('d/m/Y') }}</td>
                                    <td>{{ $report->lokasi }}</td>
                                    <td>{{ $report->instansi_dikunjungi }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $report->status == 'draft' ? 'secondary' : ($report->status == 'submitted' ? 'primary' : 'success') }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('komisioner.reports.print', $report) }}"
                                                class="btn btn-sm btn-outline-info" target="_blank" data-bs-toggle="tooltip"
                                                title="Cetak Laporan">
                                                <i class="ph-printer"></i>
                                            </a>
                                            <a href="{{ route('komisioner.laporan.edit', $report) }}"
                                                class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip"
                                                title="Edit Laporan">
                                                <i class="ph-pencil"></i>
                                            </a>
                                            <form action="{{ route('komisioner.laporan.destroy', $report) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini? Ini tidak dapat dibatalkan!');"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" title="Hapus Laporan">
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

                {{-- Navigasi halaman --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $reports->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function (el) {
                    return new bootstrap.Tooltip(el);
                });
            });
        </script>
    @endpush
@endsection
