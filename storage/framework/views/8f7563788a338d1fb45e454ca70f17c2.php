<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Cari pengguna...">
        </div>
        <div class="col-md-8 text-end">
            <button type="button" wire:click="createUser" class="btn btn-outline-primary">Tambah Pengguna Baru</button>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if($showUserForm): ?>
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0"><?php echo e($isEditMode ? 'Edit Pengguna' : 'Tambah Pengguna Baru'); ?></h6>
                <button type="button" class="btn-close" wire:click="resetForm"></button>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="saveUser">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" wire:model="name" id="name"
                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model="email" id="email"
                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    
                    <div class="mb-3">
                        <label for="role" class="form-label">Peran</label>
                        <select wire:model="role" id="role" class="form-select <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">Pilih Peran</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($r->name); ?>"><?php echo e(ucfirst($r->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi
                            <?php echo e($isEditMode ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
                        <input type="password" wire:model="password" id="password"
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" wire:model="password_confirmation" id="password_confirmation"
                            class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div class="text-end">
                        <button type="button" wire:click="resetForm" class="btn btn-light me-2">Batal</button>
                        <button type="submit"
                            class="btn btn-primary"><?php echo e($isEditMode ? 'Simpan Perubahan' : 'Tambah Pengguna'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%;">No.</th>
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        Nama
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'name'): ?>
                            <i class="ph-caret-<?php echo e($sortAsc ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'email'): ?>
                            <i class="ph-caret-<?php echo e($sortAsc ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('role')" style="cursor: pointer;">
                        Peran
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'role'): ?>
                            <i class="ph-caret-<?php echo e($sortAsc ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php echo e($user->roles->pluck('name')->first() ? ucfirst($user->roles->pluck('name')->first()) : 'N/A'); ?>

                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <button type="button" wire:click="editUser(<?php echo e($user->id); ?>)"
                                    class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Pengguna">
                                    <i class="ph-pencil"></i>
                                </button>
                                <button type="button" wire:click="deleteUser(<?php echo e($user->id); ?>)"
                                    class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Hapus Pengguna"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                    <i class="ph-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada pengguna ditemukan.</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <?php echo e($users->links()); ?>

    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/livewire/user-table.blade.php ENDPATH**/ ?>