<div class="page-header page-header-light shadow">

    <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
        <div class="d-flex">
        <div class="breadcrumb py-2">
            <a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-item"><i class="ph-house"></i></a>
            <a href="#" class="breadcrumb-item">Dashboard</a>
            <span
                class="breadcrumb-item active"><?php echo e(Auth::user()->role === 'admin' ? 'Administrator' : 'Komisioner'); ?></span>
        </div>

        <a href="#breadcrumb_elements"
            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
            data-bs-toggle="collapse">
            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
        </a>
    </div>
    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/layouts/partials/page_header.blade.php ENDPATH**/ ?>