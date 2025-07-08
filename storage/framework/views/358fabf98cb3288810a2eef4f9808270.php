<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login Komnas HAM</title>

    <link href="<?php echo e(asset('limitless4.0/assets/fonts/inter/inter.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('limitless4.0/assets/icons/phosphor/styles.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('limitless4.0/html/layout_1/full/assets/css/ltr/all.min.css')); ?>" id="stylesheet" rel="stylesheet" type="text/css">

    <?php if(app()->environment('local')): ?>
        <?php echo app('Illuminate\Foundation\Vite')([]); ?>
    <?php endif; ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

</head>

<body>

    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content d-flex justify-content-center align-items-center min-vh-100">

                    <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="card mb-0 shadow">
                            <div class="card-body">

                                <div class="text-center mb-5">
                                    <a href="<?php echo e(route('dashboard')); ?>" class="position-absolute top-0 start-50 translate-middle-x mt-2">
                                        <img src="<?php echo e(asset('limitless4.0/assets/images/komnasham2.png')); ?>" alt="Komnas HAM Logo" class="img-fluid" style="width: 200px; height: auto;">
                                    </a>
                                </div>

                                <div class="text-center mb-3">
                                    <h5 class="mb-0">Masuk ke akun Anda</h5>
                                    <span class="d-block text-muted">Masukkan kredensial Anda di bawah ini</span>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalb24df6adf99a77ed35057e476f61e153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb24df6adf99a77ed35057e476f61e153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $attributes = $__attributesOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__attributesOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $component = $__componentOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__componentOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>

                                
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="email" class="form-control" placeholder="ahmad@gmail.com" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'email','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label" for="password">Kata Sandi</label>
                                    <div class="form-control-feedback form-control-feedback-start position-relative">
                                        <input type="password" class="form-control" placeholder="•••••••••••" id="password" name="password" required autocomplete="current-password">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                        <div class="form-control-feedback-icon-end position-absolute end-0 top-50 translate-middle-y me-3" id="togglePasswordVisibility">
                                            <i class="ph-eye text-muted"></i>
                                        </div>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'password','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    <label class="form-check form-check-inline">
                                        <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                                        <span class="form-check-label">Ingat saya</span>
                                    </label>

                                    <?php if(Route::has('password.request')): ?>
                                        <a class="text-muted" href="<?php echo e(route('password.request')); ?>">Lupa kata sandi?</a>
                                    <?php endif; ?>
                                </div>

                                
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-outline-primary w-100">Masuk</button>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>

                
                <div class="navbar navbar-sm navbar-footer border-top">
                    <div class="container-fluid">
                        <span>&copy; <?php echo e(date('Y')); ?> Komnas HAM</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <script src="<?php echo e(asset('limitless4.0/assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const togglePassword = document.getElementById('togglePasswordVisibility');
            const toggleIcon = togglePassword?.querySelector('i');

            if (togglePassword && toggleIcon) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);

                    if (type === 'password') {
                        toggleIcon.classList.remove('ph-eye-slash');
                        toggleIcon.classList.add('ph-eye');
                    } else {
                        toggleIcon.classList.remove('ph-eye');
                        toggleIcon.classList.add('ph-eye-slash');
                    }
                });
            }
        });
    </script>

</body>

</html>
<?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/auth/login.blade.php ENDPATH**/ ?>