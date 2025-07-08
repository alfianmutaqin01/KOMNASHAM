

<?php $__env->startSection('content'); ?>
    <?php if(isset($activityReport)): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('create-activity-report-form', ['activityReport' => $activityReport]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3948882053-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php else: ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('create-activity-report-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3948882053-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/kegiatan/create.blade.php ENDPATH**/ ?>