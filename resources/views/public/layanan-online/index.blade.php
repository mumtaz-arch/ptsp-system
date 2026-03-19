<x-layouts.public>
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Layanan Online</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($layananList as $layanan)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $layanan->nama_layanan }}</h5>
                        <p class="text-muted">{{ Str::limit($layanan->deskripsi, 100) }}</p>
                        <a href="{{ route('layanan-online.create', ['layanan_id' => $layanan->id]) }}" class="btn btn-sm btn-success">Ajukan</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-muted">Belum ada layanan tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-layouts.public>
