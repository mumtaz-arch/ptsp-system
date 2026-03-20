<x-layouts.public>
    <!-- Hero -->
    <section class="hero-section text-center">
        <div class="container position-relative" style="z-index: 1;">
            <div class="hero-badge">PTSP MAKN Ende</div>
            <h1 class="hero-title">
                Pelayanan Terpadu<br>
                <span>Satu Pintu</span>
            </h1>
            <p class="hero-desc">
                Transparan, akuntabel, dan profesional dalam memberikan pelayanan terbaik untuk seluruh masyarakat.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('layanan-online.index') }}" class="btn btn-gold">Layanan Online</a>
                <a href="{{ route('kontak') }}" class="btn btn-outline-glass">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Pilihan layanan yang tersedia untuk Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center h-100">
                        <div class="feature-icon mx-auto"><i class="bi bi-journal-text"></i></div>
                        <h5 class="fw-bold">Buku Tamu</h5>
                        <p class="text-muted small">Catat kunjungan Anda secara digital dengan mudah dan cepat.</p>
                        <a href="{{ route('buku-tamu.create') }}" class="btn btn-sm btn-ptsp">Isi Buku Tamu</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center h-100">
                        <div class="feature-icon mx-auto"><i class="bi bi-folder2-open"></i></div>
                        <h5 class="fw-bold">Layanan Online</h5>
                        <p class="text-muted small">Ajukan berbagai layanan administrasi secara online.</p>
                        <a href="{{ route('layanan-online.index') }}" class="btn btn-sm btn-ptsp">Ajukan</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center h-100">
                        <div class="feature-icon mx-auto"><i class="bi bi-megaphone"></i></div>
                        <h5 class="fw-bold">Pengaduan</h5>
                        <p class="text-muted small">Sampaikan keluhan atau saran untuk peningkatan layanan.</p>
                        <a href="{{ route('pengaduan.create') }}" class="btn btn-sm btn-ptsp">Kirim</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center h-100">
                        <div class="feature-icon mx-auto"><i class="bi bi-telephone"></i></div>
                        <h5 class="fw-bold">Kontak</h5>
                        <p class="text-muted small">Hubungi kami untuk informasi lebih lanjut.</p>
                        <a href="{{ route('kontak') }}" class="btn btn-sm btn-ptsp">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
