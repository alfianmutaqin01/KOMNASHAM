@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Surat Tugas</h5>
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

            @if ($assignmentLetters->isEmpty())
                <div class="alert alert-info">Belum ada surat tugas yang dibuat.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover"> {{-- Tambah table-hover untuk efek hover --}}
                        <thead>
                            <tr class="table-light text-center"> {{-- Tambah table-light untuk header --}}
                                <th style="width: 5%;">No.</th>
                                <th style="width: 15%;">Nomor Surat</th>
                                <th style="width: 20%;">Komisioner</th>
                                <th style="width: 25%;">Tujuan Penugasan</th>
                                <th style="width: 15%;">Tanggal Tugas</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignmentLetters as $letter)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $letter->nomor_surat }}</td>
                                    <td>{{ $letter->nama_komisioner }} ({{ $letter->jabatan_komisioner }})</td>
                                    <td>{{ Str::limit($letter->tujuan_penugasan, 50) }}</td> {{-- Batasi tampilan --}}
                                    <td>{{ $letter->tanggal_mulai_tugas->format('d M Y') }} - {{ $letter->tanggal_selesai_tugas->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('komisioner.surat.print_pdf', $letter) }}"
                                               class="btn btn-sm btn-outline-info" target="_blank"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak PDF">
                                                <i class="ph-printer"></i>
                                            </a>
                                            <a href="{{ route('komisioner.surat.edit', $letter) }}"
                                               class="btn btn-sm btn-outline-warning"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Surat">
                                                <i class="ph-pencil"></i>
                                            </a>
                                            <form action="{{ route('komisioner.surat.destroy', $letter) }}" method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat tugas ini?');"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Surat">
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
                <div class="mt-3">
                    {{ $assignmentLetters->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Inisialisasi Tooltip Bootstrap
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>
    @endpush
@endsection
