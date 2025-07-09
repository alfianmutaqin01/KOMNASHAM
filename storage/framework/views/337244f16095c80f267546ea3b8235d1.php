<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Surat Tugas</h5>
        </div>
        <div class="card-body">
            <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if(session('info')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo e(session('info')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

            <form wire:submit.prevent="saveLetter">
                <h6 class="mb-3 text-muted">A. Informasi Komisioner Ditugaskan</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Komisioner <span class="text-danger">*</span></label>
                        <input type="text" wire:model="nama_komisioner"
                            class="form-control <?php $__errorArgs = ['nama_komisioner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nama_komisioner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jabatan Komisioner <span class="text-danger">*</span></label>
                        <input type="text" wire:model="jabatan_komisioner"
                            id="jabatan_komisioner"
                            class="form-control <?php $__errorArgs = ['jabatan_komisioner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['jabatan_komisioner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">B. Detail Penugasan</h6>
                <div class="mb-3">
                    <label class="form-label">Tujuan Penugasan <span class="text-danger">*</span></label>
                    <textarea wire:model="tujuan_penugasan"
                        class="form-control <?php $__errorArgs = ['tujuan_penugasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5"
                        placeholder="Jelaskan secara rinci tujuan penugasan ini dibuat"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tujuan_penugasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Tugas <span class="text-danger">*</span></label>
                    <input type="text" wire:model="tempat_tugas"
                        class="form-control <?php $__errorArgs = ['tempat_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Kantor Bupati Wonosobo, Desa X">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tempat_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai Tugas <span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_mulai_tugas"
                            class="form-control <?php $__errorArgs = ['tanggal_mulai_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanggal_mulai_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai Tugas <span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_selesai_tugas"
                            class="form-control <?php $__errorArgs = ['tanggal_selesai_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanggal_selesai_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Perihal (Opsional)</label>
                    <input type="text" wire:model="perihal" class="form-control <?php $__errorArgs = ['perihal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Klarifikasi Laporan Pelanggaran HAM">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['perihal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Dasar Hukum (Opsional)</label>
                    <textarea wire:model="dasar_hukum" class="form-control <?php $__errorArgs = ['dasar_hukum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        rows="3" placeholder="Sebutkan dasar hukum penugasan jika ada"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['dasar_hukum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <h6 class="mt-4 mb-3 text-muted">C. Data Persuratan Umum (Baca Saja)</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Surat Terakhir:</label>
                        <input type="text" class="form-control" value="<?php echo e($nomor_surat_terakhir_format); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teks Kop Surat:</label>
                        <textarea class="form-control" rows="3" readonly><?php echo e($kop_surat_text); ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pejabat Penanda Tangan:</label>
                        <input type="text" class="form-control" value="<?php echo e($tanda_tangan_nama); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jabatan Pejabat Penanda Tangan:</label>
                        <input type="text" class="form-control" value="<?php echo e($tanda_tangan_jabatan); ?>" readonly>
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" wire:click="saveLetter(false)" class="btn btn-outline-warning me-2">
                        Simpan Draf
                    </button>
                    <button type="button" wire:click="saveLetter(true)" class="btn btn-outline-primary">
                        Simpan dan Cetak PDF
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/livewire/create-assignment-letter-form.blade.php ENDPATH**/ ?>