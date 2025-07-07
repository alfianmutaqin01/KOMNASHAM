<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <?php echo $__env->make('layouts.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    <?php if(app()->environment('local')): ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php endif; ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>

    <?php echo $__env->make('layouts.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 

    <div class="page-content">

        <?php echo $__env->make('layouts.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="content-wrapper">

            <div class="content-inner">

                <?php echo $__env->make('layouts.partials.page_header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 

                <div class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <?php echo $__env->make('layouts.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 

            </div>

        </div>

    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('open-pdf', (event) => {
                if (event.url) {
                    window.open(event.url, '_blank'); 
                }
            });
        });
        document.addEventListener('livewire:navigated', function () { // Atau 'DOMContentLoaded' jika ini bukan komponen halaman
        window.addEventListener('open-pdf', event => {
            if (event.detail.url) {
                window.open(event.detail.url, '_blank');
            }
        });
    });

    </script>
</body>

</html><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/dashboard.blade.php ENDPATH**/ ?>