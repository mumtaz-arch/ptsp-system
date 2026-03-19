<x-layouts.admin>
    <x-slot name="header">Edit Konten</x-slot>

    <div class="card border-0 shadow-sm p-4">
        <form method="POST" action="{{ route('admin.konten.update', $konten) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $konten->judul) }}">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                <select name="tipe" class="form-select @error('tipe') is-invalid @enderror">
                    <option value="profil" {{ old('tipe', $konten->tipe) == 'profil' ? 'selected' : '' }}>Profil</option>
                    <option value="berita" {{ old('tipe', $konten->tipe) == 'berita' ? 'selected' : '' }}>Berita</option>
                </select>
                @error('tipe') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Isi <span class="text-danger">*</span></label>
                <textarea name="isi" rows="8" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $konten->isi) }}</textarea>
                @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                @if($konten->gambar)
                    <div class="mb-2"><img src="{{ asset('storage/' . $konten->gambar) }}" alt="gambar" class="img-thumbnail" style="max-height: 150px;"></div>
                @endif
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.konten.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
        </form>
    </div>
</x-layouts.admin>
