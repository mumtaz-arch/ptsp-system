<x-layouts.public>
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Form Pengaduan</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm p-4">
            <p class="text-muted mb-3">Anda dapat mengirim pengaduan secara anonim. Nama dan email bersifat opsional.</p>
            <form method="POST" action="{{ route('pengaduan.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama (Opsional)</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email (Opsional)</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Isi Pengaduan <span class="text-danger">*</span></label>
                        <textarea name="isi" rows="5" class="form-control @error('isi') is-invalid @enderror">{{ old('isi') }}</textarea>
                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.public>
