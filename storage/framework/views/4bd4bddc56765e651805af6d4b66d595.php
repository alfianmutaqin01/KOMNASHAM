<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Laporan Kegiatan</h5>
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
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['new_lampiran.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e($message); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

            <form wire:submit.prevent="saveReport">
                <h6 class="mb-3 text-muted">Identitas Pelapor</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nama Komisioner:</label>
                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="jabatan">Jabatan:</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                            placeholder="Masukkan Jabatan" value="<?php echo e(old('jabatan')); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Pelaporan:</label>
                        <input type="text" class="form-control"
                            value="<?php echo e(Carbon\Carbon::now()->translatedFormat('d F Y')); ?>" readonly>
                    </div>
                </div>

                <h6 class="mt-4 mb-3 text-muted">Informasi Kegiatan</h6>
                <div class="mb-3">
                    <label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" wire:model="nama_kegiatan"
                        class="form-control <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Klarifikasi pengaduan warga di Puskesmas X">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nama_kegiatan'];
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
                        <label class="form-label">Tanggal dan Waktu Mulai Kegiatan <span
                                class="text-danger">*</span></label>
                        <input type="datetime-local" wire:model="tanggal_mulai"
                            class="form-control <?php $__errorArgs = ['tanggal_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanggal_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal dan Waktu Selesai Kegiatan <span
                                class="text-danger">*</span></label>
                        <input type="datetime-local" wire:model="tanggal_selesai"
                            class="form-control <?php $__errorArgs = ['tanggal_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanggal_selesai'];
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
                    <label class="form-label">Lokasi Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" wire:model="lokasi_kegiatan"
                        class="form-control <?php $__errorArgs = ['lokasi_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Desa X, Kec. Y">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['lokasi_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Tujuan Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="tujuan_kegiatan"
                        class="form-control <?php $__errorArgs = ['tujuan_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                        placeholder="Jelaskan tujuan utama kegiatan ini dilaksanakan"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tujuan_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Pihak yang Terlibat</label>
                    <textarea wire:model="pihak_terlibat"
                        class="form-control <?php $__errorArgs = ['pihak_terlibat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                        placeholder="Sebutkan individu, kelompok, atau instansi yang berpartisipasi atau ditemui"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['pihak_terlibat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="deskripsi_singkat"
                        class="form-control <?php $__errorArgs = ['deskripsi_singkat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5"
                        placeholder="Ceritakan kronologi atau ringkasan jalannya kegiatan"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['deskripsi_singkat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <h6 class="mt-4 mb-3 text-muted">Hasil & Tindak Lanjut</h6>
                <div class="mb-3">
                    <label class="form-label">Hasil/Output Kegiatan <span class="text-danger">*</span></label>
                    <textarea wire:model="hasil_kegiatan"
                        class="form-control <?php $__errorArgs = ['hasil_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5"
                        placeholder="Apa yang telah dicapai dari kegiatan ini?"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['hasil_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Tindak Lanjut/Rekomendasi</label>
                    <textarea wire:model="tindak_lanjut"
                        class="form-control <?php $__errorArgs = ['tindak_lanjut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                        placeholder="Langkah-langkah selanjutnya atau rekomendasi yang dihasilkan"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tindak_lanjut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label class="form-label">Permasalahan/Tantangan</label>
                    <textarea wire:model="permasalahan_tantangan"
                        class="form-control <?php $__errorArgs = ['permasalahan_tantangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                        placeholder="Hambatan atau kendala yang dihadapi selama kegiatan"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['permasalahan_tantangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <h6 class="mt-4 mb-3 text-muted">Lampiran (Opsional)</h6>
                <div class="mb-3">
                    <label for="lampiran" class="form-label">Unggah Lampiran</label>
                    <input type="file" wire:model="new_lampiran" id="new_lampiran" multiple
                        class="form-control <?php $__errorArgs = ['new_lampiran.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <!--[if BLOCK]><![endif]--><?php if($new_lampiran): ?>
                        <div class="mt-2">
                            <p class="text-muted">File baru yang akan diunggah:</p>
                            <ul>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $new_lampiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($file->getClientOriginalName()); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['new_lampiran.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if(!empty($existing_lampiran)): ?>
                        <div class="mt-3">
                            <label class="form-label">Lampiran Saat Ini:</label>
                            <ul class="list-group">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $existing_lampiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="ph-file me-2"></i> <?php echo e(basename($path)); ?></span>
                                        <button type="button" wire:click="removeLampiran(<?php echo e($index); ?>)"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="ph-x"></i> Hapus
                                        </button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="text-end">
                    <button type="button" wire:click="saveReport(false)" class="btn btn-outline-warning me-2">Simpan
                        Draf</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan dan Cetak PDF</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/livewire/create-activity-report-form.blade.php ENDPATH**/ ?>