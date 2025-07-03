<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <div class="sidebar-content">

        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigasi</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Utama</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                            <span
                                class="d-block fw-normal opacity-50">{{ Auth::user()->role === 'admin' ? 'Admin' : 'Komisioner' }}</span>
                        </span>
                    </a>
                </li>

                @role('admin')
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Manajemen Data Admin
                    </div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="ph-users-three"></i>
                        <span>Manajemen Pengguna</span>
                    </a>
                </li>
                @endrole

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Aktivitas Komisioner
                    </div> {{-- Ganti Kegiatan Komisioner menjadi Aktivitas Komisioner --}}
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>

                {{-- Menu Laporan Hasil Sidak --}}
                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('komisioner.laporan.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-note-pencil"></i>
                        <span>Laporan Hasil Sidak</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ request()->routeIs('komisioner.laporan.*') ? 'show' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route('komisioner.laporan.baru') }}"
                                class="nav-link {{ request()->routeIs('komisioner.laporan.baru') ? 'active' : '' }}">
                                <span>Buat Laporan Sidak</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('komisioner.laporan.riwayat') }}"
                                class="nav-link {{ request()->routeIs('komisioner.laporan.riwayat') || request()->routeIs('komisioner.laporan.edit') ? 'active' : '' }}"> {{-- Tambah active untuk edit --}}
                                Riwayat Laporan Sidak
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- TAMBAH: Menu Laporan Kegiatan Baru --}}
                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('komisioner.kegiatan.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-file-text"></i>
                        <span>Laporan Kegiatan</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ request()->routeIs('komisioner.kegiatan.*') ? 'show' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route('komisioner.kegiatan.baru') }}" class="nav-link {{ request()->routeIs('komisioner.kegiatan.baru') ? 'active' : '' }}">
                                Buat Laporan Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('komisioner.kegiatan.riwayat') }}" class="nav-link {{ request()->routeIs('komisioner.kegiatan.riwayat') || request()->routeIs('komisioner.kegiatan.edit') ? 'active' : '' }}">
                                Riwayat Laporan Kegiatan
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('komisioner.surat.cetak') }}" class="nav-link">
                        <i class="ph-printer"></i>
                        <span>Cetak Surat Tugas</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>