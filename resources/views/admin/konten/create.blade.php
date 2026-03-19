<x-layouts.admin>
    <x-slot name="header">Tambah Konten</x-slot>

    <div class="card border-0 shadow-sm p-4">
        <form method="POST" action="{{ route('admin.konten.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                <select name="tipe" class="form-select @error('tipe') is-invalid @enderror">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="profil" {{ old('tipe') == 'profil' ? 'selected' : '' }}>Profil</option>
                    <option value="berita" {{ old('tipe') == 'berita' ? 'selected' : '' }}>Berita</option>
                </select>
                @error('tipe') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Isi <span class="text-danger">*</span></label>
                <textarea name="isi" rows="8" class="form-control @error('isi') is-invalid @enderror">{{ old('isi') }}</textarea>
                @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar (JPG/PNG, Maks 2MB)</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.konten.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
        </form>
    </div>
</x-layouts.admin>
