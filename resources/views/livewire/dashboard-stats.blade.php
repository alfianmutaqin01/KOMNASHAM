{{-- File: resources/views/livewire/dashboard-stats.blade.php --}}
<div>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">{{ $totalLaporanSidak }}</h3>
                        <div class="ms-auto">
                            <i class="ph-note-pencil display-4 opacity-75"></i> {{-- Pastikan ikon muncul --}}
                        </div>
                    </div>
                    <div>
                        Total Laporan Sidak
                        <div class="fs-sm opacity-75">Jumlah keseluruhan laporan sidak</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">{{ $totalLaporanKegiatan }}</h3>
                        <div class="ms-auto">
                            <i class="ph-file-text display-4 opacity-75"></i>
                        </div>
                    </div>
                    <div>
                        Total Laporan Kegiatan
                        <div class="fs-sm opacity-75">Jumlah keseluruhan laporan kegiatan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">{{ $totalSuratTugas }}</h3>
                        <div class="ms-auto">
                            <i class="ph-printer display-4 opacity-75"></i>
                        </div>
                    </div>
                    <div>
                        Total Surat Tugas
                        <div class="fs-sm opacity-75">Jumlah surat tugas yang diterbitkan</div>
                    </div>
                </div>
            </div>
        </div>
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
                    @if ($laporanBulanan->isEmpty())
                        <p class="text-muted">Tidak ada data laporan bulanan.</p>
                    @else
                        <svg id="barChartBulanan" style="width: 100%; height: 350px;"></svg>
                    @endif
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
                        <div class="col-sm-6 d-flex flex-column align-items-center justify-content-center"
                            style="min-height: 250px;">
                            <h6 class="mb-2 text-center">Laporan Sidak</h6>
                            @if ($laporanSidakPerStatus->isEmpty())
                                <p class="text-muted fs-sm">Tidak ada data.</p>
                            @else
                                <svg id="pieChartSidak" style="width: 100%; height: 200px;"></svg>
                                <div id="legendSidak" class="text-center fs-sm mt-2"></div>
                            @endif
                        </div>
                        <div class="col-sm-6 d-flex flex-column align-items-center justify-content-center"
                            style="min-height: 250px;">
                            <h6 class="mb-2 text-center">Laporan Kegiatan</h6>
                            @if ($laporanKegiatanPerStatus->isEmpty())
                                <p class="text-muted fs-sm">Tidak ada data.</p>
                            @else
                                <svg id="pieChartKegiatan" style="width: 100%; height: 200px;"></svg>
                                <div id="legendKegiatan" class="text-center fs-sm mt-2"></div>
                            @endif
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
                        <a href="{{ route('komisioner.laporan.riwayat') }}" class="btn btn-light btn-sm">Lihat Semua
                            Laporan Sidak</a>
                        <a href="{{ route('komisioner.kegiatan.riwayat') }}" class="btn btn-light btn-sm ms-2">Lihat
                            Semua Laporan Kegiatan</a>
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
                            @forelse ($latestActivities as $activity)
                                <tr>
                                    <td>
                                        <span
                                            class="badge bg-{{ $activity->type === 'Laporan Sidak' ? 'primary' : 'success' }}">
                                            {{ $activity->type }}
                                        </span>
                                    </td>
                                    <td>{{ Str::limit($activity->description, 70) }}</td>
                                    <td>{{ $activity->user->name ?? 'N/A' }}</td>
                                    <td>{{ $activity->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada aktivitas terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const dataSidak = @json($laporanSidakPerStatus);
            const dataKegiatan = @json($laporanKegiatanPerStatus);
            const dataBulanan = @json($laporanBulanan);

            const colors = d3.scaleOrdinal(d3.schemeCategory10);

            function drawPieChart(selector, data, legendSelector) {
                if (!data || data.length === 0) {
                    d3.select(selector).selectAll("*").remove();
                    d3.select(legendSelector).selectAll("*").remove();
                    return;
                }

                const svg = d3.select(selector);
                const containerWidth = svg.node().parentNode.getBoundingClientRect().width;
                const containerHeight = svg.node().parentNode.getBoundingClientRect().height;
                const width = containerWidth;
                const height = Math.min(containerWidth, containerHeight * 0.8);
                const radius = Math.min(width, height) / 2;

                svg.attr("width", width)
                    .attr("height", height);
                svg.selectAll("*").remove();

                const g = svg.append("g")
                    .attr("transform", `translate(${width / 2},${height / 2})`);

                const pie = d3.pie()
                    .value(d => d.value)
                    .sort(null);

                const arc = d3.arc()
                    .innerRadius(0)
                    .outerRadius(radius * 0.8);

                const outerArc = d3.arc()
                    .innerRadius(radius * 0.9)
                    .outerRadius(radius * 0.9);

                const arcs = g.selectAll(".arc")
                    .data(pie(data))
                    .enter().append("g")
                    .attr("class", "arc");

                arcs.append("path")
                    .attr("d", arc)
                    .attr("fill", (d, i) => colors(i))
                    .attr("stroke", "white")
                    .style("stroke-width", "1px");

                arcs.append("text")
                    .attr("transform", d => {
                        const pos = outerArc.centroid(d);
                        const midangle = d.startAngle + (d.endAngle - d.startAngle) / 2;
                        pos[0] = radius * 0.99 * (midangle < Math.PI ? 1 : -1);
                        return `translate(${pos})`;
                    })
                    .attr("dy", "0.35em")
                    .attr("text-anchor", d => (d.startAngle + d.endAngle) / 2 < Math.PI ? "start" : "end")
                    .text(d => `${d.data.label} (${d.data.value})`)
                    .style("font-size", "10px")
                    .style("fill", "#333");

                arcs.append("polyline")
                    .attr("stroke", "#ccc")
                    .style("fill", "none")
                    .attr("stroke-width", 1)
                    .attr("points", d => {
                        const posA = arc.centroid(d);
                        const posB = outerArc.centroid(d);
                        const posC = outerArc.centroid(d);
                        const midangle = d.startAngle + (d.endAngle - d.startAngle) / 2;
                        posC[0] = radius * 0.95 * (midangle < Math.PI ? 1 : -1);
                        return [posA, posB, posC];
                    });

                const legendEl = d3.select(legendSelector);
                legendEl.selectAll("*").remove();
                const legend = legendEl.append("div")
                    .attr("class", "d-flex flex-wrap justify-content-center");

                data.forEach((d, i) => {
                    const legendItem = legend.append("div")
                        .attr("class", "d-flex align-items-center me-3 mb-1");

                    legendItem.append("span")
                        .style("background-color", colors(i))
                        .style("width", "12px")
                        .style("height", "12px")
                        .style("display", "inline-block")
                        .style("margin-right", "5px")
                        .style("border-radius", "3px");

                    legendItem.append("span")
                        .text(`${d.label} (${d.value})`)
                        .style("font-size", "12px")
                        .style("color", "#333");
                });
            }

            function drawBarChart(selector, data) {
                if (!data || data.length === 0) {
                    d3.select(selector).selectAll("*").remove();
                    return;
                }

                const svg = d3.select(selector);
                const margin = { top: 20, right: 20, bottom: 60, left: 50 };
                const containerWidth = svg.node().parentNode.getBoundingClientRect().width;
                const containerHeight = svg.node().parentNode.getBoundingClientRect().height;
                const width = containerWidth - margin.left - margin.right;
                const height = containerHeight - margin.top - margin.bottom;

                svg.attr("width", containerWidth)
                    .attr("height", containerHeight);
                svg.selectAll("*").remove();

                const g = svg.append("g")
                    .attr("transform", `translate(${margin.left},${margin.top})`);

                const x = d3.scaleBand()
                    .rangeRound([0, width])
                    .padding(0.1)
                    .domain(data.map(d => d.bulan));

                const y = d3.scaleLinear()
                    .rangeRound([height, 0])
                    .domain([0, d3.max(data, d => d.total)]);

                g.append("g")
                    .attr("class", "axis axis--x")
                    .attr("transform", `translate(0,${height})`)
                    .call(d3.axisBottom(x))
                    .selectAll("text")
                    .style("text-anchor", "end")
                    .attr("dx", "-.8em")
                    .attr("dy", ".15em")
                    .attr("transform", "rotate(-45)")
                    .style("font-size", "10px")
                    .style("fill", "#333");

                g.append("g")
                    .attr("class", "axis axis--y")
                    .call(d3.axisLeft(y).ticks(5))
                    .append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", "0.71em")
                    .attr("text-anchor", "end")
                    .text("Jumlah Laporan")
                    .style("font-size", "10px")
                    .style("fill", "#333");

                g.selectAll(".bar")
                    .data(data)
                    .enter().append("rect")
                    .attr("class", "bar")
                    .attr("x", d => x(d.bulan))
                    .attr("y", d => y(d.total))
                    .attr("width", x.bandwidth())
                    .attr("height", d => height - y(d.total))
                    .attr("fill", "#4285F4");

                g.selectAll(".bar-text")
                    .data(data)
                    .enter().append("text")
                    .attr("class", "bar-text")
                    .attr("x", d => x(d.bulan) + x.bandwidth() / 2)
                    .attr("y", d => y(d.total) - 5)
                    .attr("text-anchor", "middle")
                    .text(d => d.total)
                    .style("font-size", "10px")
                    .style("fill", "#333");
            }
            drawPieChart('#pieChartSidak', dataSidak, '#legendSidak');
            drawPieChart('#pieChartKegiatan', dataKegiatan, '#legendKegiatan');
            drawBarChart('#barChartBulanan', dataBulanan);

            window.addEventListener('resize', () => {
                drawPieChart('#pieChartSidak', dataSidak, '#legendSidak');
                drawPieChart('#pieChartKegiatan', dataKegiatan, '#legendKegiatan');
                drawBarChart('#barChartBulanan', dataBulanan);
            });
        });
    </script>
</div>