<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('status')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(Laravel\Fortify\Features::canUpdateProfileInformation()): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Profil</h5>
                    <span class="d-block text-muted">Perbarui informasi profil dan alamat email akun Anda.</span>
                </div>
                <div class="card-body">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-profile-information-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3587436389-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords())): ?>
            <div class="card mb-4"> 
                <div class="card-header">
                    <h5 class="mb-0">Perbarui Kata Sandi</h5>
                    <span class="d-block text-muted">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap
                        aman.</span>
                </div>
                <div class="card-body">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-password-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3587436389-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(Laravel\Fortify\Features::canManageTwoFactorAuthentication()): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Autentikasi Dua Faktor</h5>
                    <span class="d-block text-muted">Tambahkan keamanan tambahan ke akun Anda menggunakan autentikasi dua
                        faktor.</span>
                </div>
                <div class="card-body">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.two-factor-authentication-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3587436389-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sesi Browser</h5>
                <span class="d-block text-muted">Kelola dan logout sesi browser aktif Anda di perangkat dan browser
                    lain.</span>
            </div>
            <div class="card-body">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.logout-other-browser-sessions-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3587436389-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>

        <?php if(Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures()): ?>
            <div class="card mb-4 border-danger border-2">
                <div class="card-header bg-danger text-white">
                    <span class="d-block text-white-75">Hapus akun Anda secara permanen.</span>
                </div>
                <div class="card-body">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.delete-user-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3587436389-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/profile/show.blade.php ENDPATH**/ ?>