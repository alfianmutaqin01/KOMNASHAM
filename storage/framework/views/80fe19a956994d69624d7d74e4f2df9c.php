<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Selamat Datang, <?php echo e(Auth::user()->name); ?>!</h5>
        </div>
        <div class="card-body">
            <p>Ini adalah halaman dashboard utama Anda.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/dashboard/default.blade.php ENDPATH**/ ?>