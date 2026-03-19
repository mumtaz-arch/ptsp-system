<x-layouts.admin>
    <x-slot name="header">Detail Pengajuan</x-slot>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Informasi Pemohon</h5>
                <table class="table table-borderless">
                    <tr><th>Nama</th><td>{{ $pengajuan->nama }}</td></tr>
                    <tr><th>Email</th><td>{{ $pengajuan->email }}</td></tr>
                    <tr><th>No HP</th><td>{{ $pengajuan->no_hp }}</td></tr>
                    <tr><th>Layanan</th><td>{{ $pengajuan->layanan->nama_layanan ?? '-' }}</td></tr>
                    <tr><th>Deskripsi</th><td>{{ $pengajuan->deskripsi ?? '-' }}</td></tr>
                    <tr><th>Tanggal</th><td>{{ $pengajuan->created_at->format('d M Y H:i') }}</td></tr>
                    @if($pengajuan->file)
                    <tr><th>File</th><td><a href="{{ asset('storage/' . $pengajuan->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">Download</a></td></tr>
                    @endif
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Update Status</h5>
                <form method="POST" action="{{ route('admin.pengajuan.update', $pengajuan) }}">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            @foreach(['pending', 'diproses', 'selesai', 'ditolak'] as $status)
                                <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catatan Admin</label>
                        <textarea name="catatan_admin" rows="3" class="form-control">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-outline-secondary ms-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
