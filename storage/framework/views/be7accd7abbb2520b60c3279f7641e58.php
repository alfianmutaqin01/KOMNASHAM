<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Dashboard Komnas HAM - <?php echo e(Auth::user()->role === 'admin' ? 'Administrator' : 'Komisioner'); ?></title>

<link href="<?php echo e(asset('limitless4.0/assets/fonts/inter/inter.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('limitless4.0/assets/icons/phosphor/styles.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('limitless4.0/html/layout_1/full/assets/css/ltr/all.min.css')); ?>" id="stylesheet"
    rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('limitless4.0/assets/demo/demo_configurator.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/js/vendor/visualization/d3/d3.min.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/js/vendor/visualization/d3/d3_tooltip.js')); ?>"></script>

<script src="<?php echo e(asset('limitless4.0/html/layout_1/full/assets/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/pages/dashboard.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/streamgraph.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/sparklines.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/lines.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/areas.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/donuts.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/bars.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/progress.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/heatmaps.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/pies.js')); ?>"></script>
<script src="<?php echo e(asset('limitless4.0/assets/demo/charts/pages/dashboard/bullets.js')); ?>"></script><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/layouts/partials/head.blade.php ENDPATH**/ ?>