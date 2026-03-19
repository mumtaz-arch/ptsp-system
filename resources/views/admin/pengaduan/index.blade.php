<x-layouts.admin>
    <x-slot name="header">Data Pengaduan</x-slot>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Daftar Pengaduan</h5>
            <a href="{{ route('admin.pengaduan.export-pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="pengaduanTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengaduan as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama ?? 'Anonim' }}</td>
                        <td>{{ $item->email ?? '-' }}</td>
                        <td>{{ Str::limit($item->isi, 50) }}</td>
                        <td>
                            @php
                                $badgeClass = match($item->status) {
                                    'baru' => 'bg-warning text-dark',
                                    'diproses' => 'bg-info',
                                    'selesai' => 'bg-success',
                                    default => 'bg-secondary'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($item->status) }}</span>
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td><a href="{{ route('admin.pengaduan.show', $item) }}" class="btn btn-sm btn-primary">Detail</a></td>
                    </tr>
                    @endforeach
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
    <script>$(document).ready(function() { $('#pengaduanTable').DataTable(); });</script>
    @endpush
</x-layouts.admin>
