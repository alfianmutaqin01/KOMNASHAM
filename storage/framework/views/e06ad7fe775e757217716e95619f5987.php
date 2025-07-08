

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pengaturan Surat Tugas</h5>
        </div>
        <div class="card-body">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.letter-settings', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-583315013-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/admin/settings/letter.blade.php ENDPATH**/ ?>