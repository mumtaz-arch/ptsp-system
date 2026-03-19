<x-layouts.admin>
    <x-slot name="header">Tambah Layanan</x-slot>

    <div class="card border-0 shadow-sm p-4">
        <form method="POST" action="{{ route('admin.layanan.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                <input type="text" name="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" value="{{ old('nama_layanan') }}">
                @error('nama_layanan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
        </form>
    </div>
</x-layouts.admin>
