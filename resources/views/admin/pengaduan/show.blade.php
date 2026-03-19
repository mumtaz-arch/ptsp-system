<x-layouts.admin>
    <x-slot name="header">Detail Pengaduan</x-slot>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Isi Pengaduan</h5>
                <table class="table table-borderless">
                    <tr><th>Nama</th><td>{{ $pengaduan->nama ?? 'Anonim' }}</td></tr>
                    <tr><th>Email</th><td>{{ $pengaduan->email ?? '-' }}</td></tr>
                    <tr><th>Tanggal</th><td>{{ $pengaduan->created_at->format('d M Y H:i') }}</td></tr>
                </table>
                <p class="mt-2">{{ $pengaduan->isi }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Update Status</h5>
                <form method="POST" action="{{ route('admin.pengaduan.update', $pengaduan) }}">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            @foreach(['baru', 'diproses', 'selesai'] as $status)
                                <option value="{{ $status }}" {{ $pengaduan->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline-secondary ms-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
