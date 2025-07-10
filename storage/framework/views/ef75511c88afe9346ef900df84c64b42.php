<div>
    
    <div class="row">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [
            ['title' => 'Laporan Sidak', 'icon' => 'ph-note-pencil', 'value' => $totalLaporanSidak, 'color' => 'primary'],
            ['title' => 'Laporan Kegiatan', 'icon' => 'ph-file-text', 'value' => $totalLaporanKegiatan, 'color' => 'success'],
            ['title' => 'Surat Tugas', 'icon' => 'ph-printer', 'value' => $totalSuratTugas, 'color' => 'info'],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-<?php echo e($stat['color']); ?> text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0"><?php echo e($stat['value']); ?></h3>
                        <div class="ms-auto">
                            <i class="<?php echo e($stat['icon']); ?> display-4 opacity-75"></i>
                        </div>
                    </div>
                    <div>
                        Total <?php echo e($stat['title']); ?>

                        <div class="fs-sm opacity-75">Jumlah keseluruhan <?php echo e(strtolower($stat['title'])); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    
    <div class="row">
        
        <div class="col-xl-7 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0">Total Laporan Per Bulan (12 Bulan Terakhir)</h5>
                    <div class="ms-auto">
                        <span class="badge bg-primary rounded-pill">Sidak & Kegiatan</span>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                    <!--[if BLOCK]><![endif]--><?php if($laporanBulanan->isEmpty()): ?>
                        <p class="text-muted">Tidak ada data laporan bulanan.</p>
                    <?php else: ?>
                        <svg id="barChartBulanan" wire:ignore style="width: 100%; height: 350px;"></svg>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>

        
        <div class="col-xl-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Distribusi Laporan per Status</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-sm-6 d-flex flex-column align-items-center justify-content-center" style="min-height: 250px;">
                            <h6 class="mb-2 text-center">Laporan Sidak</h6>
                            <!--[if BLOCK]><![endif]--><?php if($laporanSidakPerStatus->isEmpty()): ?>
                                <p class="text-muted fs-sm">Tidak ada data.</p>
                            <?php else: ?>
                                <svg id="pieChartSidak" wire:ignore style="width: 100%; height: 200px;"></svg>
                                <div id="legendSidak" class="text-center fs-sm mt-2"></div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        
                        <div class="col-sm-6 d-flex flex-column align-items-center justify-content-center" style="min-height: 250px;">
                            <h6 class="mb-2 text-center">Laporan Kegiatan</h6>
                            <!--[if BLOCK]><![endif]--><?php if($laporanKegiatanPerStatus->isEmpty()): ?>
                                <p class="text-muted fs-sm">Tidak ada data.</p>
                            <?php else: ?>
                                <svg id="pieChartKegiatan" wire:ignore style="width: 100%; height: 200px;"></svg>
                                <div id="legendKegiatan" class="text-center fs-sm mt-2"></div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0">Aktivitas Terbaru</h5>
                    <div class="ms-auto">
                        <a href="<?php echo e(route('komisioner.laporan.riwayat')); ?>" class="btn btn-light btn-sm">Lihat Semua Laporan Sidak</a>
                        <a href="<?php echo e(route('komisioner.kegiatan.riwayat')); ?>" class="btn btn-light btn-sm ms-2">Lihat Semua Laporan Kegiatan</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Tipe Laporan</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $latestActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><span class="badge bg-<?php echo e($activity->type === 'Laporan Sidak' ? 'primary' : 'success'); ?>"><?php echo e($activity->type); ?></span></td>
                                    <td><?php echo e(Str::limit($activity->description, 70)); ?></td>
                                    <td><?php echo e($activity->user->name ?? 'N/A'); ?></td>
                                    <td><?php echo e($activity->created_at->diffForHumans()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="text-center">Tidak ada aktivitas terbaru.</td></tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
        <?php
        $__scriptKey = '2478470670-0';
        ob_start();
    ?>
    <script>
        const renderAllCharts = () => {
            const dataBulanan = <?php echo json_encode($laporanBulanan, 15, 512) ?>;
            const dataSidak = <?php echo json_encode($laporanSidakPerStatus, 15, 512) ?>;
            const dataKegiatan = <?php echo json_encode($laporanKegiatanPerStatus, 15, 512) ?>;
            const color = d3.scaleOrdinal(d3.schemeCategory10);

            function drawBarChart(selector, data) {
                const svg = d3.select(selector).html('');
                const margin = { top: 20, right: 20, bottom: 40, left: 50 };
                const width = svg.node().clientWidth - margin.left - margin.right;
                const height = svg.node().clientHeight - margin.top - margin.bottom;

                const chart = svg.append("g")
                    .attr("transform", `translate(${margin.left},${margin.top})`);

                const x = d3.scaleBand().domain(data.map(d => d.bulan)).range([0, width]).padding(0.2);
                const y = d3.scaleLinear().domain([0, d3.max(data, d => d.total)]).nice().range([height, 0]);

                chart.selectAll("rect")
                    .data(data)
                    .enter().append("rect")
                    .attr("x", d => x(d.bulan))
                    .attr("y", d => y(d.total))
                    .attr("height", d => height - y(d.total))
                    .attr("width", x.bandwidth())
                    .attr("fill", "#4e73df");

                chart.append("g")
                    .attr("transform", `translate(0,${height})`)
                    .call(d3.axisBottom(x))
                    .selectAll("text")
                    .attr("transform", "rotate(-30)")
                    .style("text-anchor", "end");

                chart.append("g").call(d3.axisLeft(y));
            }

            function drawPieChart(selector, data, legendSelector) {
                const svg = d3.select(selector).html('');
                const legend = d3.select(legendSelector).html('');
                const width = svg.node().clientWidth;
                const height = svg.node().clientHeight;
                const radius = Math.min(width, height) / 2;

                const chart = svg.append("g")
                    .attr("transform", `translate(${width / 2}, ${height / 2})`);

                const pie = d3.pie().value(d => d.value);
                const arc = d3.arc().innerRadius(0).outerRadius(radius);

                const arcs = chart.selectAll("arc")
                    .data(pie(data))
                    .enter().append("g");

                arcs.append("path")
                    .attr("d", arc)
                    .attr("fill", (_, i) => color(i));

                data.forEach((d, i) => {
                    legend.append("div")
                        .style("color", color(i))
                        .text(`${d.label}: ${d.value}`);
                });
            }

            if (dataBulanan.length) drawBarChart('#barChartBulanan', dataBulanan);
            if (dataSidak.length) drawPieChart('#pieChartSidak', dataSidak, '#legendSidak');
            if (dataKegiatan.length) drawPieChart('#pieChartKegiatan', dataKegiatan, '#legendKegiatan');
        };

        document.addEventListener('DOMContentLoaded', renderAllCharts);
        document.addEventListener('livewire:navigated', renderAllCharts);
        window.addEventListener('resize', renderAllCharts);
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>
<?php /**PATH D:\Kuliah\Kerja Praktek\KOMNASHAM\resources\views/livewire/dashboard-stats.blade.php ENDPATH**/ ?>