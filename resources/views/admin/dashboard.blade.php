<x-layouts.admin>
    <x-slot name="header">Dashboard</x-slot>

    <!-- Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-4 col-lg">
            <div class="stat-card">
                <div class="stat-label">Total Pengunjung</div>
                <div class="stat-value">{{ $totalPengunjung }}</div>
            </div>
        </div>
        <div class="col-md-4 col-lg">
            <div class="stat-card">
                <div class="stat-label">Total Pengajuan</div>
                <div class="stat-value">{{ $totalPengajuan }}</div>
            </div>
        </div>
        <div class="col-md-4 col-lg">
            <div class="stat-card">
                <div class="stat-label">Total Pengaduan</div>
                <div class="stat-value">{{ $totalPengaduan }}</div>
            </div>
        </div>
        <div class="col-md-4 col-lg">
            <div class="stat-card">
                <div class="stat-label">Pending Pengajuan</div>
                <div class="stat-value" style="color: var(--ptsp-gold);">{{ $pendingPengajuan }}</div>
            </div>
        </div>
        <div class="col-md-4 col-lg">
            <div class="stat-card">
                <div class="stat-label">Pengaduan Baru</div>
                <div class="stat-value" style="color: #ef4444;">{{ $pengaduanBaru }}</div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="row">
        <div class="col-12">
            <div class="stat-card p-4">
                <h5 class="fw-bold mb-3">Statistik Bulanan ({{ date('Y') }})</h5>
                <div style="height: 350px;">
                    <canvas id="dashboardChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('assets/js/chart.umd.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Chart(document.getElementById('dashboardChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [
                        {
                            label: 'Pengunjung',
                            data: @json($chartPengunjung),
                            backgroundColor: 'rgba(22, 101, 52, 0.8)',
                            borderColor: '#166534',
                            borderWidth: 1,
                            borderRadius: 6
                        },
                        {
                            label: 'Pengajuan',
                            data: @json($chartPengajuan),
                            backgroundColor: 'rgba(245, 158, 11, 0.8)',
                            borderColor: '#f59e0b',
                            borderWidth: 1,
                            borderRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'top' } },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        });
    </script>
    @endpush
</x-layouts.admin>
