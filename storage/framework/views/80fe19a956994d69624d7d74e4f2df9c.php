<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Selamat Datang, <?php echo e(Auth::user()->name); ?>!</h5>
        </div>
        <div class="card-body">
            <p>Ini adalah halaman dashboard utama Anda. Berikut ringkasan aktivitas Komisi HAM Kabupaten Wonosobo:</p>
        </div>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard-stats', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2997688134-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/dashboard/default.blade.php ENDPATH**/ ?>