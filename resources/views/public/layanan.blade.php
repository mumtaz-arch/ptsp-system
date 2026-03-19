<x-layouts.public>
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Daftar Layanan</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Surat Keterangan</h5>
                        <p class="text-muted">Penerbitan surat keterangan siswa/guru.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Legalisir</h5>
                        <p class="text-muted">Pengajuan legalisir dokumen resmi.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('layanan-online.index') }}" class="btn btn-success">Ajukan Layanan Online →</a>
        </div>
    </div>
</x-layouts.public>
