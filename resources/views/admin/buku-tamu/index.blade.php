<x-layouts.admin>
    <x-slot name="header">Data Buku Tamu</x-slot>

    <!-- Filter -->
    <div class="card border-0 shadow-sm p-3 mb-4">
        <form method="GET" action="{{ route('admin.buku-tamu.index') }}" class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100" type="submit">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.buku-tamu.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.buku-tamu.export-pdf', request()->query()) }}" class="btn btn-danger w-100">Export PDF</a>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm p-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="bukuTamuTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>No HP</th>
                        <th>Tujuan</th>
                        <th>Keperluan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bukuTamu as $key => $tamu)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $tamu->nama }}</td>
                        <td>{{ $tamu->instansi ?? '-' }}</td>
                        <td>{{ $tamu->no_hp }}</td>
                        <td>{{ $tamu->tujuan }}</td>
                        <td>{{ Str::limit($tamu->keperluan, 50) }}</td>
                        <td>{{ $tamu->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $tamu->jam }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    @endpush

    @push('scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#bukuTamuTable').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ baris",
                    info: "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                    paginate: { next: "Lanjut", previous: "Kembali" }
                }
            });
        });
    </script>
    @endpush
</x-layouts.admin>
