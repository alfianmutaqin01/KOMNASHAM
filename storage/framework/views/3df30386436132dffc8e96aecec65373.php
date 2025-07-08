<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pengaturan Umum Surat Tugas</h5>
        </div>
        <div class="card-body">
            <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <form wire:submit.prevent="saveSettings">
                <div class="mb-3">
                    <label for="nomor_surat_terakhir_format" class="form-label">Format Nomor Surat</label>
                    <input type="text" wire:model="nomor_surat_terakhir_format" id="nomor_surat_terakhir_format"
                        class="form-control <?php $__errorArgs = ['nomor_surat_terakhir_format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: 000/SK/KOMDAHAM/VII/YYYY">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nomor_surat_terakhir_format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label for="kop_surat_text" class="form-label">Teks Kop Surat</label>
                    <textarea wire:model="kop_surat_text" id="kop_surat_text"
                        class="form-control <?php $__errorArgs = ['kop_surat_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['kop_surat_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_nama" class="form-label">Nama Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_nama" id="tanda_tangan_nama"
                        class="form-control <?php $__errorArgs = ['tanda_tangan_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanda_tangan_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan_jabatan" class="form-label">Jabatan Pejabat Penanda Tangan</label>
                    <input type="text" wire:model="tanda_tangan_jabatan" id="tanda_tangan_jabatan"
                        class="form-control <?php $__errorArgs = ['tanda_tangan_jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanda_tangan_jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <h6 class="mt-4 mb-3 text-muted">Statistik Surat Tugas</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Total Surat Tugas Tahun Ini
                            (<?php echo e(Carbon\Carbon::now()->year); ?>):</label>
                        <input type="text" class="form-control" value="<?php echo e($totalSuratTahunIni); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Total Surat Tugas Keseluruhan:</label>
                        <input type="text" class="form-control" value="<?php echo e($totalSuratKeseluruhan); ?>" readonly>
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">Visualisasi Jumlah Surat Per Tahun</h6>
                <!--[if BLOCK]><![endif]--><?php if($yearlyLetterCounts->isEmpty()): ?>
                    <p class="text-muted">Belum ada data surat tugas yang dibuat.</p>
                <?php else: ?>
                    <ul class="list-group mb-3">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $yearlyLetterCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yearData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tahun <?php echo e($yearData->tahun); ?>:
                                <span class="badge bg-primary rounded-pill"><?php echo e($yearData->total); ?> Surat</span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                <div class="text-end">
                    <button type="submit" class="btn btn-outline-primary">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/livewire/admin/letter-settings.blade.php ENDPATH**/ ?>