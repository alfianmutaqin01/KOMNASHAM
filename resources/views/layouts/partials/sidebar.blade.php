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

                @if (Auth::user()->role === 'admin')
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
                @endif {{-- End if Admin --}}

                @if (Auth::user()->role === 'user')
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Kegiatan Komisioner
                        </div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                @endif {{-- End if Komisioner --}}
                <li class="nav-item">
                    <a href="{{ route('komisioner.laporan.baru') }}" class="nav-link">

                        <i class="ph-note-pencil"></i>
                        <span>Buat Laporan Baru</span>
                    </a>
                </li>
                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('komisioner.laporan.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-file-text"></i>
                        <span>Laporan Kegiatan</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ request()->routeIs('komisioner.laporan.*') ? 'show' : '' }}">
                        <li class="nav-item"><a href="{{ route('komisioner.laporan.riwayat') }}"
                                class="nav-link">Riwayat Laporan</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Draf Laporan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('komisioner.surat.cetak') }}" class="nav-link">
                        <i class="ph-printer"></i>
                        <span>Cetak Surat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>