

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Surat Tugas</h5>
        </div>
        <div class="card-body">
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
            <?php endif; ?>

            <?php if($assignmentLetters->isEmpty()): ?>
                <div class="alert alert-info">Belum ada surat tugas yang dibuat.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th style="width: 20%;">Nomor Surat</th>
                                <th style="width: 20%;">Komisioner</th>
                                <th style="width: 20%;">Tujuan Penugasan</th>
                                <th style="width: 15%;">Tanggal Tugas</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $assignmentLetters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($letter->nomor_surat); ?></td>
                                    <td><?php echo e($letter->nama_komisioner); ?> (<?php echo e($letter->jabatan_komisioner); ?>)</td>
                                    <td><?php echo e(Str::limit($letter->tujuan_penugasan, 50)); ?></td> 
                                    <td><?php echo e($letter->tanggal_mulai_tugas->format('d M Y')); ?> - <?php echo e($letter->tanggal_selesai_tugas->format('d M Y')); ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="<?php echo e(route('komisioner.surat.print_pdf', $letter)); ?>"
                                               class="btn btn-sm btn-outline-info" target="_blank"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak PDF">
                                                <i class="ph-printer"></i>
                                            </a>
                                            <a href="<?php echo e(route('komisioner.surat.edit', $letter)); ?>"
                                               class="btn btn-sm btn-outline-warning"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Surat">
                                                <i class="ph-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('komisioner.surat.destroy', $letter)); ?>" method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat tugas ini?');"
                                                  class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Surat">
                                                    <i class="ph-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <?php echo e($assignmentLetters->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/assignment_letters/history.blade.php ENDPATH**/ ?>