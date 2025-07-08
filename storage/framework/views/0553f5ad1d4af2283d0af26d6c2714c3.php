<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php if(auth()->user()->hasRole('admin')): ?>
                <div class="alert alert-primary">Anda melihat semua laporan.</div>
            <?php else: ?>
                <div class="alert alert-info">Anda melihat laporan yang Anda buat.</div>
            <?php endif; ?>

            <h5 class="mb-0">Riwayat Laporan Sidak</h5>
        </div>
        <div class="card-body">
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if($reports->isEmpty()): ?>
                <div class="alert alert-info">Belum ada laporan yang dibuat.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th style="width: 15%;">Tanggal Sidak</th>
                                <th style="width: 25%;">Lokasi</th>
                                <th style="width: 30%;">Instansi</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($report->tanggal_sidak->format('d/m/Y')); ?></td>
                                    <td><?php echo e($report->lokasi); ?></td>
                                    <td><?php echo e($report->instansi_dikunjungi); ?></td>
                                    <td class="text-center">
                                        <span
                                            class="badge bg-<?php echo e($report->status == 'draft' ? 'secondary' : ($report->status == 'submitted' ? 'primary' : 'success')); ?>">
                                            <?php echo e(ucfirst($report->status)); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            
                                            <a href="<?php echo e(route('komisioner.reports.print', $report)); ?>"
                                                class="btn btn-sm btn-outline-info" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Cetak Laporan">
                                                <i class="ph-printer"></i>
                                            </a>

                                            
                                            <a href="<?php echo e(route('komisioner.laporan.edit', $report)); ?>"
                                                class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Laporan">
                                                <i class="ph-pencil"></i>
                                            </a>

                                            
                                            <form action="<?php echo e(route('komisioner.laporan.destroy', $report)); ?>" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini? Ini tidak dapat dibatalkan!');"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus Laporan">
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
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/komisioner/reports/history.blade.php ENDPATH**/ ?>