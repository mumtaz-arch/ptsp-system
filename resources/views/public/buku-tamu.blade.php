<x-layouts.public>
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Buku Tamu Digital</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm p-4">
            <form method="POST" action="{{ route('buku-tamu.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instansi</label>
                        <input type="text" name="instansi" class="form-control @error('instansi') is-invalid @enderror" value="{{ old('instansi') }}">
                        @error('instansi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. HP <span class="text-danger">*</span></label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tujuan <span class="text-danger">*</span></label>
                        <select name="tujuan" class="form-select @error('tujuan') is-invalid @enderror">
                            <option value="">-- Pilih Tujuan --</option>
                            <option value="Kepala Madrasah" {{ old('tujuan') == 'Kepala Madrasah' ? 'selected' : '' }}>Kepala Madrasah</option>
                            <option value="Tata Usaha" {{ old('tujuan') == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                            <option value="Guru" {{ old('tujuan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Layanan Umum" {{ old('tujuan') == 'Layanan Umum' ? 'selected' : '' }}>Layanan Umum</option>
                        </select>
                        @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Keperluan <span class="text-danger">*</span></label>
                        <textarea name="keperluan" rows="3" class="form-control @error('keperluan') is-invalid @enderror">{{ old('keperluan') }}</textarea>
                        @error('keperluan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.public>
