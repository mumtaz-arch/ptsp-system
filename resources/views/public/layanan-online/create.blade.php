<x-layouts.public>
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Form Pengajuan Layanan</h2>

        <div class="card border-0 shadow-sm p-4">
            <form method="POST" action="{{ route('layanan-online.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. HP <span class="text-danger">*</span></label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                        <select name="layanan_id" class="form-select @error('layanan_id') is-invalid @enderror">
                            <option value="">-- Pilih Layanan --</option>
                            @foreach($layananList as $layanan)
                                <option value="{{ $layanan->id }}" {{ old('layanan_id', request('layanan_id')) == $layanan->id ? 'selected' : '' }}>{{ $layanan->nama_layanan }}</option>
                            @endforeach
                        </select>
                        @error('layanan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Upload File (PDF/JPG/PNG, Maks 2MB)</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                        @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Kirim Pengajuan</button>
                        <a href="{{ route('layanan-online.index') }}" class="btn btn-outline-secondary ms-2">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.public>
