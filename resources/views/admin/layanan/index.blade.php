<x-layouts.admin>
    <x-slot name="header">Kelola Layanan</x-slot>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Daftar Layanan</h5>
            <a href="{{ route('admin.layanan.create') }}" class="btn btn-success btn-sm">Tambah Layanan</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="layananTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Layanan</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanan as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_layanan }}</td>
                        <td>{{ Str::limit($item->deskripsi, 60) }}</td>
                        <td><span class="badge bg-primary">{{ $item->pengajuan_count }}</span></td>
                        <td>
                            <a href="{{ route('admin.layanan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.layanan.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus layanan ini?')">Hapus</button>
                            </form>
                        </td>
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
    <script>$(document).ready(function() { $('#layananTable').DataTable(); });</script>
    @endpush
</x-layouts.admin>
