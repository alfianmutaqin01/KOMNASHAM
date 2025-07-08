<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="<?php echo e(route('dashboard')); ?>" class="d-inline-flex align-items-center">
                <img src="<?php echo e(asset('limitless4.0/assets/images/komnasham.png')); ?>" alt="Komnas HAM Logo Icon"
                    class="img-fluid" style="width: 200px; height: auto;">
            </a>
        </div>


        <div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
            <div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3">

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

            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="<?php echo e(Auth::user()->profile_photo_url); ?>" class="w-32px h-32px rounded-pill"
                            alt="<?php echo e(Auth::user()->name); ?>">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2"><?php echo e(Auth::user()->name); ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="<?php echo e(route('profile.show')); ?>" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" @click.prevent="$root.submit();">
                            <i class="ph-sign-out me-2"></i>
                            Keluar
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/layouts/partials/navbar.blade.php ENDPATH**/ ?>