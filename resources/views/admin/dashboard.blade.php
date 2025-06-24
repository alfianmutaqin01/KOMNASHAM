<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dashboard Admin Komnas HAM</title>

	<link href="{{ asset('limitless4.0/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless4.0/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless4.0/html/layout_1/full/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
	<script src="{{ asset('limitless4.0/assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>

	<script src="{{ asset('limitless4.0/html/layout_1/full/assets/js/app.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/pages/dashboard.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/streamgraph.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/sparklines.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/lines.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/areas.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/donuts.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/bars.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/progress.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/heatmaps.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/pies.js') }}"></script>
	<script src="{{ asset('limitless4.0/assets/demo/charts/pages/dashboard/bullets.js') }}"></script>
	{{-- Penting untuk Livewire/Alpine.js dari Jetstream --}}
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
</head>

<body>

	<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
		<div class="container-fluid">
			<div class="d-flex d-lg-none me-2">
				<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
					<i class="ph-list"></i>
				</button>
			</div>

			<div class="navbar-brand flex-1 flex-lg-0">
				<a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center">
					{{-- Ganti dengan logo Komnas HAM Anda --}}
					<img src="{{ asset('limitless4.0/assets/images/logo_icon.svg') }}" alt="Komnas HAM Logo Icon">
					<img src="{{ asset('limitless4.0/assets/images/logo_text_light.svg') }}" class="d-none d-sm-inline-block h-16px ms-3" alt="Komnas HAM">
				</a>
			</div>

			<ul class="nav flex-row">
				<li class="nav-item d-lg-none">
					<a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="collapse">
						<i class="ph-magnifying-glass"></i>
					</a>
				</li>

				{{-- Dropdown Aplikasi Komnas HAM --}}
				<li class="nav-item nav-item-dropdown-lg dropdown">
					<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown">
						<i class="ph-squares-four"></i>
					</a>

					<div class="dropdown-menu dropdown-menu-scrollable-sm wmin-lg-600 p-0">
						<div class="d-flex align-items-center border-bottom p-3">
							<h6 class="mb-0">Aplikasi Komnas HAM</h6>
							<a href="#" class="ms-auto">
								Lihat semua
								<i class="ph-arrow-circle-right ms-1"></i>
							</a>
						</div>

						<div class="row row-cols-1 row-cols-sm-2 g-0">
							<div class="col">
								<a href="#" class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom p-3">
									<div>
										<i class="ph-file-text fs-2 mb-2 text-primary"></i>
										<div class="fw-semibold my-1">Manajemen Laporan</div>
										<div class="text-muted">Kelola laporan pengaduan masyarakat</div>
									</div>
								</a>
							</div>
							<div class="col">
								<a href="{{ route('admin.users') }}" class="dropdown-item text-wrap h-100 align-items-start border-bottom p-3">
									<div>
										<i class="ph-users-three fs-2 mb-2 text-success"></i>
										<div class="fw-semibold my-1">Manajemen Pengguna</div>
										<div class="text-muted">Kelola akun admin dan komisioner</div>
									</div>
								</a>
							</div>
							<div class="col">
								<a href="#" class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom border-bottom-sm-0 rounded-bottom-start p-3">
									<div>
										<i class="ph-chart-bar fs-2 mb-2 text-warning"></i>
										<div class="fw-semibold my-1">Statistik & Analisis</div>
										<div class="text-muted">Visualisasi data & tren pelanggaran HAM</div>
									</div>
								</a>
							</div>
							<div class="col">
								<a href="{{ route('admin.settings') }}" class="dropdown-item text-wrap h-100 align-items-start rounded-bottom-end p-3">
									<div>
										<i class="ph-gear fs-2 mb-2 text-info"></i>
										<div class="fw-semibold my-1">Pengaturan Sistem</div>
										<div class="text-muted">Konfigurasi umum aplikasi</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</li>

				{{-- Dropdown Pesan (contoh) --}}
				<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
					<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown" data-bs-auto-close="outside">
						<i class="ph-chats"></i>
						<span class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">8</span>
					</a>
					<div class="dropdown-menu wmin-lg-400 p-0">
						<div class="d-flex align-items-center p-3">
							<h6 class="mb-0">Pesan</h6>
							<div class="ms-auto">
								<a href="#" class="text-body">
									<i class="ph-plus-circle"></i>
								</a>
								<a href="#search_messages" class="collapsed text-body ms-2" data-bs-toggle="collapse">
									<i class="ph-magnifying-glass"></i>
								</a>
							</div>
						</div>
						<div class="collapse" id="search_messages">
							<div class="px-3 mb-2">
								<div class="form-control-feedback form-control-feedback-start">
									<input type="text" class="form-control" placeholder="Cari pesan">
									<div class="form-control-feedback-icon">
										<i class="ph-magnifying-glass"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="dropdown-menu-scrollable pb-2">
							<a href="#" class="dropdown-item align-items-start text-wrap py-2">
								<div class="status-indicator-container me-3">
									<img src="{{ asset('limitless4.0/assets/images/demo/users/face10.jpg') }}" class="w-40px h-40px rounded-pill" alt="">
									<span class="status-indicator bg-warning"></span>
								</div>
								<div class="flex-1">
									<span class="fw-semibold">James Alexander</span>
									<span class="text-muted float-end fs-sm">04:58</span>
									<div class="text-muted">Pesan singkat dari rekan kerja...</div>
								</div>
							</a>
							<a href="#" class="dropdown-item align-items-start text-wrap py-2">
								<div class="status-indicator-container me-3">
									<img src="{{ asset('limitless4.0/assets/images/demo/users/face3.jpg') }}" class="w-40px h-40px rounded-pill" alt="">
									<span class="status-indicator bg-success"></span>
								</div>
								<div class="flex-1">
									<span class="fw-semibold">Margo Baker</span>
									<span class="text-muted float-end fs-sm">12:16</span>
									<div class="text-muted">Tindak lanjut laporan kasus...</div>
								</div>
							</a>
						</div>
						<div class="d-flex border-top py-2 px-3">
							<a href="#" class="text-body">
								<i class="ph-checks me-1"></i>
								Tandai semua terbaca
							</a>
							<a href="#" class="text-body ms-auto">
								Lihat semua
								<i class="ph-arrow-circle-right ms-1"></i>
							</a>
						</div>
					</div>
				</li>
			</ul>

			<div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
				<div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3">
					<div class="form-control-feedback form-control-feedback-start flex-grow-1" data-color-theme="dark">
						<input type="text" class="form-control bg-transparent rounded-pill" placeholder="Cari..." data-bs-toggle="dropdown">
						<div class="form-control-feedback-icon">
							<i class="ph-magnifying-glass"></i>
						</div>
						<div class="dropdown-menu w-100" data-color-theme="light">
							<button type="button" class="dropdown-item">
								<div class="text-center w-32px me-3">
									<i class="ph-magnifying-glass"></i>
								</div>
								<span>Cari <span class="fw-bold">"..."</span> di mana saja</span>
							</button>

							<div class="dropdown-divider"></div>

							<div class="dropdown-menu-scrollable-lg">
								<div class="dropdown-header">
									Laporan
									<a href="#" class="float-end">
										Lihat semua
										<i class="ph-arrow-circle-right ms-1"></i>
									</a>
								</div>
								<div class="dropdown-item cursor-pointer">
									<div class="me-3">
										<i class="ph-file-text w-32px h-32px rounded-pill d-flex align-items-center justify-content-center text-primary"></i>
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<div class="fw-semibold">Laporan Pelanggaran <mark>HAM</mark> #123</div>
										<span class="fs-sm text-muted">Pelanggaran hak sipil</span>
									</div>
									<div class="d-inline-flex">
										<a href="#" class="text-body ms-2">
											<i class="ph-info"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<a href="#" class="navbar-nav-link align-items-center justify-content-center w-40px h-32px rounded-pill position-absolute end-0 top-50 translate-middle-y p-0 me-1" data-bs-toggle="dropdown" data-bs-auto-close="outside">
						<i class="ph-faders-horizontal"></i>
					</a>

					<div class="dropdown-menu w-100 p-3">
						<div class="d-flex align-items-center mb-3">
							<h6 class="mb-0">Opsi Pencarian</h6>
							<a href="#" class="text-body rounded-pill ms-auto">
								<i class="ph-clock-counter-clockwise"></i>
							</a>
						</div>

						<div class="mb-3">
							<label class="d-block form-label">Kategori</label>
							<label class="form-check form-check-inline">
								<input type="checkbox" class="form-check-input" checked>
								<span class="form-check-label">Laporan</span>
							</label>
							<label class="form-check form-check-inline">
								<input type="checkbox" class="form-check-input">
								<span class="form-check-label">Pengguna</span>
							</label>
							<label class="form-check form-check-inline">
								<input type="checkbox" class="form-check-input">
								<span class="form-check-label">Petugas</span>
							</label>
						</div>

						<div class="d-flex">
							<button type="button" class="btn btn-light">Reset</button>

							<div class="ms-auto">
								<button type="button" class="btn btn-light">Batal</button>
								<button type="button" class="btn btn-primary ms-2">Terapkan</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<ul class="nav flex-row justify-content-end order-1 order-lg-2">
				<li class="nav-item ms-lg-2">
					<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas" data-bs-target="#notifications">
						<i class="ph-bell"></i>
						<span class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
					</a>
				</li>

				<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
						<div class="status-indicator-container">
							<img src="{{ Auth::user()->profile_photo_url }}" class="w-32px h-32px rounded-pill" alt="{{ Auth::user()->name }}">
							<span class="status-indicator bg-success"></span>
						</div>
						<span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-end">
						<a href="{{ route('profile.show') }}" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							Profil Saya
						</a>
						<a href="#" class="dropdown-item">
							<i class="ph-gear me-2"></i>
							Pengaturan Akun
						</a>
						<div class="dropdown-divider"></div>
						<form method="POST" action="{{ route('logout') }}" x-data>
							@csrf
							<a href="{{ route('logout') }}" class="dropdown-item" @click.prevent="$root.submit();">
								<i class="ph-sign-out me-2"></i>
								Keluar
							</a>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="page-content">

		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<div class="sidebar-content">

				<div class="sidebar-section">
					<div class="sidebar-section-body d-flex justify-content-center">
						<h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigasi</h5>

						<div>
							<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
								<i class="ph-arrows-left-right"></i>
							</button>

							<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
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
							<a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
								<i class="ph-house"></i>
								<span>
									Dashboard Admin
									<span class="d-block fw-normal opacity-50">Ringkasan Sistem</span>
								</span>
							</a>
						</li>

						<li class="nav-item-header">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Manajemen Data</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
								<i class="ph-users-three"></i>
								<span>Manajemen Pengguna</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{ request()->routeIs('admin.reports.*') || request()->routeIs('admin.complaints.*') ? 'nav-item-expanded nav-item-open' : '' }}">
							<a href="#" class="nav-link">
								<i class="ph-file-text"></i>
								<span>Laporan & Pengaduan</span>
							</a>
							<ul class="nav-group-sub collapse {{ request()->routeIs('admin.reports.*') || request()->routeIs('admin.complaints.*') ? 'show' : '' }}">
								<li class="nav-item"><a href="#" class="nav-link">Daftar Laporan</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Verifikasi Pengaduan</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Laporan Terarsip</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-briefcase"></i>
								<span>Manajemen Kasus</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-newspaper"></i>
								<span>Berita & Publikasi</span>
							</a>
						</li>

						<li class="nav-item-header">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Pengaturan</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
								<i class="ph-gear"></i>
								<span>Pengaturan Sistem</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-lock"></i>
								<span>Manajemen Peran & Izin</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-chart-pie"></i>
								<span>Log Aktivitas</span>
							</a>
						</li>

					</ul>
				</div>

			</div>

		</div>

		<div class="content-wrapper">

			<div class="content-inner">

				<div class="page-header page-header-light shadow">
					<div class="page-header-content d-lg-flex">
						<div class="d-flex">
							<h4 class="page-title mb-0">
								Admin - <span class="fw-normal">Dashboard</span>
							</h4>

							<a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
								<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
							</a>
						</div>

						<div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
							<div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
								<div class="dropdown w-100 w-sm-auto">
									<a href="#" class="d-flex align-items-center text-body lh-1 dropdown-toggle py-sm-2" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="ph-buildings w-32px h-32px me-2 text-primary"></i>
										<div class="me-auto me-lg-1">
											<div class="fs-sm text-muted mb-1">Unit Organisasi</div>
											<div class="fw-semibold">Divisi Penanganan Kasus</div>
										</div>
									</a>

									<div class="dropdown-menu dropdown-menu-lg-end w-100 w-lg-auto wmin-300 wmin-sm-350 pt-0">
										<div class="d-flex align-items-center p-3">
											<h6 class="fw-semibold mb-0">Unit Kerja</h6>
											<a href="#" class="ms-auto">
												Lihat semua
												<i class="ph-arrow-circle-right ms-1"></i>
											</a>
										</div>
										<a href="#" class="dropdown-item active py-2">
											<i class="ph-bookmark-simple w-32px h-32px me-2 text-primary"></i>
											<div>
												<div class="fw-semibold">Divisi Penanganan Kasus</div>
												<div class="fs-sm text-muted">120 laporan aktif</div>
											</div>
										</a>
										<a href="#" class="dropdown-item py-2">
											<i class="ph-clipboard-text w-32px h-32px me-2 text-success"></i>
											<div>
												<div class="fw-semibold">Divisi Pendidikan & Sosialisasi</div>
												<div class="fs-sm text-muted">8 program berjalan</div>
											</div>
										</a>
									</div>
								</div>

								<div class="vr d-none d-sm-block flex-shrink-0 my-2 mx-3"></div>

								<div class="d-inline-flex mt-3 mt-sm-0">
									<a href="#" class="status-indicator-container ms-1">
										<img src="{{ asset('limitless4.0/assets/images/demo/users/face24.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
										<span class="status-indicator bg-warning"></span>
									</a>
									<a href="#" class="status-indicator-container ms-1">
										<img src="{{ asset('limitless4.0/assets/images/demo/users/face1.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
										<span class="status-indicator bg-success"></span>
									</a>
									<a href="#" class="status-indicator-container ms-1">
										<img src="{{ asset('limitless4.0/assets/images/demo/users/face3.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
										<span class="status-indicator bg-danger"></span>
									</a>
									<a href="#" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
										<i class="ph-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="page-header-content d-lg-flex border-top">
						<div class="d-flex">
							<div class="breadcrumb py-2">
								<a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
								<a href="#" class="breadcrumb-item">Admin</a>
								<span class="breadcrumb-item active">Dashboard</span>
							</div>

							<a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
								<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
							</a>
						</div>

						<div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
							<div class="d-lg-flex mb-2 mb-lg-0">
								<a href="#" class="d-flex align-items-center text-body py-2">
									<i class="ph-lifebuoy me-2"></i>
									Bantuan
								</a>

								<div class="dropdown ms-lg-3">
									<a href="#" class="d-flex align-items-center text-body dropdown-toggle py-2" data-bs-toggle="dropdown">
										<i class="ph-gear me-2"></i>
										<span class="flex-1">Pengaturan</span>
									</a>

									<div class="dropdown-menu dropdown-menu-end w-100 w-lg-auto">
										<a href="#" class="dropdown-item">
											<i class="ph-shield-warning me-2"></i>
											Keamanan Akun
										</a>
										<a href="#" class="dropdown-item">
											<i class="ph-chart-bar me-2"></i>
											Analisis Data
										</a>
										<div class="dropdown-divider"></div>
										<a href="{{ route('admin.settings') }}" class="dropdown-item">
											<i class="ph-gear me-2"></i>
											Semua Pengaturan
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="content">

					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0">Ringkasan Statistik Komnas HAM</h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-4">
											<div class="d-flex align-items-center justify-content-center mb-2">
												<a href="#" class="bg-primary bg-opacity-10 text-primary lh-1 rounded-pill p-2 me-3">
													<i class="ph-file-text"></i>
												</a>
												<div>
													<div class="fw-semibold">Total Laporan Masuk</div>
													<span class="text-muted">1,234 laporan</span>
												</div>
											</div>
											<div class="w-75 mx-auto mb-3" id="reports-received-chart"></div>
										</div>

										<div class="col-sm-4">
											<div class="d-flex align-items-center justify-content-center mb-2">
												<a href="#" class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3">
													<i class="ph-check-circle"></i>
												</a>
												<div>
													<div class="fw-semibold">Laporan Terverifikasi</div>
													<span class="text-muted">987 laporan</span>
												</div>
											</div>
											<div class="w-75 mx-auto mb-3" id="reports-verified-chart"></div>
										</div>

										<div class="col-sm-4">
											<div class="d-flex align-items-center justify-content-center mb-2">
												<a href="#" class="bg-warning bg-opacity-10 text-warning lh-1 rounded-pill p-2 me-3">
													<i class="ph-users-three"></i>
												</a>
												<div>
													<div class="fw-semibold">Petugas Aktif</div>
													<span class="text-muted">56 petugas</span>
												</div>
											</div>
											<div class="w-75 mx-auto mb-3" id="active-staff-chart"></div>
										</div>
									</div>
								</div>
								<div class="chart position-relative" id="komnasham-stats-overview"></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="card bg-info text-white">
								<div class="card-body">
									<div class="d-flex">
										<h3 class="mb-0">156</h3>
										<span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">+12%</span>
									</div>
									<div>
										Kasus Baru Bulan Ini
										<div class="fs-sm opacity-75">Dibanding bulan lalu</div>
									</div>
								</div>
								<div class="rounded-bottom overflow-hidden mx-3" id="new-cases-chart"></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card bg-purple text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<h3 class="mb-0">89%</h3>
										<div class="dropdown d-inline-flex ms-auto">
											<a href="#" class="text-white d-inline-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown">
												<i class="ph-gear"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">Perbarui Data</a>
												<a href="#" class="dropdown-item">Log Detail</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">Bersihkan Daftar</a>
											</div>
										</div>
									</div>
									<div>
										Tingkat Penyelesaian Kasus
										<div class="fs-sm opacity-75">Target 95%</div>
									</div>
								</div>
								<div class="rounded-bottom overflow-hidden" id="case-resolution-chart"></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card bg-success text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<h3 class="mb-0">24</h3>
										<div class="ms-auto">
											<a class="text-white" data-card-action="reload">
												<i class="ph-arrows-clockwise"></i>
											</a>
										</div>
									</div>
									<div>
										Pengaduan Menunggu Verifikasi
										<div class="fs-sm opacity-75">Tinjau segera</div>
									</div>
								</div>
								<div class="rounded-bottom overflow-hidden" id="pending-complaints-chart"></div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header d-sm-flex align-items-sm-center py-sm-0">
							<h5 class="py-sm-2 my-sm-1">Aktivitas Terbaru Laporan & Pengguna</h5>
							<div class="mt-2 mt-sm-0 ms-sm-auto">
								<select class="form-select">
									<option value="val1" selected>Minggu Ini</option>
									<option value="val2">Bulan Ini</option>
									<option value="val3">Tahun Ini</option>
								</select>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Tipe</th>
										<th>Deskripsi</th>
										<th>Status</th>
										<th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
									</tr>
								</thead>
								<tbody>
									<tr class="table-light">
										<td colspan="4">Laporan & Pengaduan Baru</td>
										<td class="text-end"><span class="badge bg-primary rounded-pill">5</span></td>
									</tr>
									<tr>
										<td><span class="fw-semibold">24 Jun 2025</span></td>
										<td><span class="badge bg-info bg-opacity-10 text-info">Pengaduan</span></td>
										<td><a href="#" class="text-body">Pelanggaran Hak Anak di Wilayah X</a></td>
										<td><span class="badge bg-warning bg-opacity-10 text-warning">Menunggu Verifikasi</span></td>
										<td class="text-center">
											<div class="dropdown">
												<a href="#" class="text-body" data-bs-toggle="dropdown"><i class="ph-list"></i></a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Lihat Detail</a>
													<a href="#" class="dropdown-item"><i class="ph-check-circle me-2"></i> Verifikasi</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><span class="fw-semibold">23 Jun 2025</span></td>
										<td><span class="badge bg-success bg-opacity-10 text-success">Laporan Kasus</span></td>
										<td><a href="#" class="text-body">Update Kasus Kekerasan Seksual Y</a></td>
										<td><span class="badge bg-primary bg-opacity-10 text-primary">Sedang Ditangani</span></td>
										<td class="text-center">
											<div class="dropdown">
												<a href="#" class="text-body" data-bs-toggle="dropdown"><i class="ph-list"></i></a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Lihat Detail</a>
													<a href="#" class="dropdown-item"><i class="ph-pencil-simple me-2"></i> Edit Progres</a>
												</div>
											</div>
										</td>
									</tr>
									<tr class="table-light">
										<td colspan="4">Aktivitas Pengguna Admin</td>
										<td class="text-end"><span class="badge bg-secondary rounded-pill">3</span></td>
									</tr>
									<tr>
										<td><span class="fw-semibold">24 Jun 2025</span></td>
										<td><span class="badge bg-danger bg-opacity-10 text-danger">Pengguna</span></td>
										<td><a href="#" class="text-body">Admin A menambahkan Pengguna Baru B</a></td>
										<td><span class="badge bg-dark bg-opacity-10 text-dark">Selesai</span></td>
										<td class="text-center">
											<div class="dropdown">
												<a href="#" class="text-body" data-bs-toggle="dropdown"><i class="ph-list"></i></a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="#" class="dropdown-item"><i class="ph-info me-2"></i> Detail Log</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

				<div class="navbar navbar-sm navbar-footer border-top">
					<div class="container-fluid">
						<span>&copy; 2025 <a href="https://komnasham.go.id" target="_blank">Komnas HAM</a></span>

						<ul class="nav">
							<li class="nav-item">
								<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-lifebuoy"></i>
										<span class="d-none d-md-inline-block ms-2">Bantuan</span>
									</div>
								</a>
							</li>
							<li class="nav-item ms-md-1">
								<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-file-text"></i>
										<span class="d-none d-md-inline-block ms-2">Dokumentasi</span>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

		</div>

	</div>

	<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
		<div class="offcanvas-header py-0">
			<h5 class="offcanvas-title py-3">Aktivitas Notifikasi</h5>
			<button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body p-0">
			<div class="bg-light fw-medium py-2 px-3">Notifikasi Baru</div>
			<div class="p-3">
				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="{{ asset('limitless4.0/assets/images/demo/users/face1.jpg') }}" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-success"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">{{ Auth::user()->name }}</a> telah menyelesaikan verifikasi laporan <a href="#">#12345</a> dari daftar <a href="#">Pengaduan Baru</a>.
						<div class="fs-sm text-muted mt-1">2 jam yang lalu</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="{{ asset('limitless4.0/assets/images/demo/users/face3.jpg') }}" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-warning"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Sistem</a> menambahkan 4 laporan baru ke channel <span class="fw-semibold">Laporan Masyarakat</span>
						<div class="fs-sm text-muted mt-1">3 jam yang lalu</div>
					</div>
				</div>

				<div class="d-flex align-items-start">
					<div class="me-3">
						<div class="bg-warning bg-opacity-10 text-warning rounded-pill">
							<i class="ph-warning p-2"></i>
						</div>
					</div>
					<div class="flex-1">
						Peringatan: Kasus <a href="#">#98765</a> belum ada update selama 7 hari.
						<div class="fs-sm text-muted mt-1">4 jam yang lalu</div>
					</div>
				</div>
			</div>

			<div class="bg-light fw-medium py-2 px-3">Notifikasi Lama</div>
			<div class="p-3">
				<div class="text-center">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
		<div class="position-absolute top-50 end-100 visible">
			<button type="button" class="btn btn-primary btn-icon translate-middle-y rounded-end-0" data-bs-toggle="offcanvas" data-bs-target="#demo_config">
				<i class="ph-gear"></i>
			</button>
		</div>

		<div class="offcanvas-header border-bottom py-0">
			<h5 class="offcanvas-title py-3">Konfigurasi Demo</h5>
			<button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body">
			<div class="fw-semibold mb-2">Mode Warna</div>
			<div class="list-group mb-3">
				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-sun ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Tema Terang</span>
								<div class="fs-sm text-muted">Set tema terang atau reset ke default</div>
							</div>
						</div
						><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="light" checked>
					</div>
				</label>

				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-moon ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Tema Gelap</span>
								<div class="fs-sm text-muted">Beralih ke tema gelap</div>
							</div>
						</div
						><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="dark">
					</div>
				</label>

				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-0">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-translate ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Tema Otomatis</span>
								<div class="fs-sm text-muted">Atur tema berdasarkan mode sistem</div>
							</div>
						</div
						><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="auto">
					</div>
				</label>
			</div>
			<div class="border-top text-center py-2 px-3">
				<a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn btn-yellow fw-semibold w-100 my-1" target="_blank">
					<i class="ph-shopping-cart me-2"></i>
					Beli Limitless
				</a>
			</div>
		</div>
	</div>

    @livewireScripts
    @stack('scripts')
</body>
</html>