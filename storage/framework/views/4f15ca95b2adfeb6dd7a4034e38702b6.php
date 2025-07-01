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
        </ul>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
    <div class="offcanvas-header py-0">
        <h5 class="offcanvas-title py-3">Aktivitas Notifikasi</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
            data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
        </button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="bg-light fw-medium py-2 px-3">Notifikasi</div>
        <div class="p-3">
            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="<?php echo e(asset('limitless4.0/assets/images/demo/users/face1.jpg')); ?>"
                        class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-success"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold"><?php echo e(Auth::user()->name); ?></a> telah menyelesaikan verifikasi
                    laporan <a href="#">#12345</a> dari daftar <a href="#">Pengaduan Baru</a>.
                    <div class="fs-sm text-muted mt-1">2 jam yang lalu</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="<?php echo e(asset('limitless4.0/assets/images/demo/users/face3.jpg')); ?>"
                        class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-warning"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">Sistem</a> menambahkan 4 laporan baru ke channel <span
                        class="fw-semibold">Laporan Masyarakat</span>
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
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
    <div class="position-absolute top-50 end-100 visible">
        <button type="button" class="btn btn-outline-primary btn-icon translate-middle-y rounded-end-0"
            data-bs-toggle="offcanvas" data-bs-target="#demo_config">
            <i class="ph-gear"></i>
        </button>
    </div>

    <div class="offcanvas-header border-bottom py-0">
        <h5 class="offcanvas-title py-3">Sesuaikan Tema</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
            data-bs-dismiss="offcanvas">
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
                    </div><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                        value="light" checked>
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
                    </div><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                        value="dark">
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
                    </div><input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                        value="auto">
                </div>
            </label>
        </div>
    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/layouts/partials/footer.blade.php ENDPATH**/ ?>