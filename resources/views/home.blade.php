@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- ── Hero ──────────────────────────────────────────────── -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5 py-5">

            <!-- Teks kiri -->
            <div class="col-lg-6" style="z-index:2;">
                <div class="hero-badge">
                    <i class="bi bi-stars" style="color:var(--accent);"></i>
                    <span>Praktisi IT</span> & Administrasi Pendidikan
                </div>

                <h1 class="hero-title">
                    Membangun<br>
                    <span class="highlight">Solusi Digital</span><br>
                    untuk Pendidikan
                </h1>

                <p class="hero-subtitle">
                    Halo, saya <strong>Rahmad Widyo</strong>. Saya membantu sekolah dan instansi pendidikan dalam proses digitalisasi melalui pengembangan aplikasi web, webinar teknologi, dan pemanfaatan AI.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-accent btn-lg">
                        Lihat Portofolio
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-dark btn-lg">
                        Hubungi Saya
                    </a>
                </div>

                <!-- Stats -->
                <div class="d-flex flex-wrap gap-3">
                    <div class="hero-stat">
                        <div>
                            <div class="hero-stat-num">{{ \App\Models\Portfolio::where('status','published')->count() }}+</div>
                            <div class="hero-stat-label">Project Selesai</div>
                        </div>
                    </div>
                    <div class="hero-stat">
                        <div>
                            <div class="hero-stat-num">{{ \App\Models\Webinar::count() }}+</div>
                            <div class="hero-stat-label">Webinar</div>
                        </div>
                    </div>
                    <div class="hero-stat">
                        <div>
                            <div class="hero-stat-num">3+</div>
                            <div class="hero-stat-label">Organisasi</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Foto kanan -->
            <div class="col-lg-6 d-none d-lg-block">
                <div style="position:relative; display:flex; justify-content:center; align-items:center; min-height:480px;">

                    <!-- Lingkaran biru besar -->
                    <div style="
                        width: 420px;
                        height: 420px;
                        border-radius: 50%;
                        background: linear-gradient(145deg, #93c5fd, #2563eb);
                        overflow: hidden;
                        position: relative;
                        box-shadow: 0 20px 60px rgba(37,99,235,0.35);
                        flex-shrink: 0;
                    ">
                        <!-- Foto di dalam lingkaran -->
                        <img src="{{ asset('storage/rahmad.png.png') }}?v={{ filemtime(storage_path('app/public/rahmad.png.png')) }}"
                             alt="Rahmad Widyo"
                             style="
                                 position: absolute;
                                 bottom: 0;
                                 left: 50%;
                                 transform: translateX(-50%);
                                 height: 105%;
                                 width: auto;
                                 object-fit: contain;
                                 object-position: bottom center;
                             "
                             onerror="this.style.display='none'">
                    </div>

                    <!-- Chip floating kiri -->
                    <div style="
                        position:absolute; top:28%; left:0; z-index:3;
                        background:#fff; border-radius:14px;
                        padding:0.55rem 1rem;
                        box-shadow:0 4px 20px rgba(0,0,0,0.1);
                        font-size:0.8rem; font-weight:700;
                        white-space:nowrap;
                    ">
                        <i class="bi bi-code-slash me-1" style="color:var(--primary);"></i>Laravel & PHP
                    </div>

                    <!-- Chip floating kanan -->
                    <div style="
                        position:absolute; top:58%; right:0; z-index:3;
                        background:#fff; border-radius:14px;
                        padding:0.55rem 1rem;
                        box-shadow:0 4px 20px rgba(0,0,0,0.1);
                        font-size:0.8rem; font-weight:700;
                        white-space:nowrap;
                    ">
                        <i class="bi bi-robot me-1" style="color:var(--primary);"></i>AI Enthusiast
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ── Layanan ────────────────────────────────────────────── -->
<section class="py-5" style="background:#ffffff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Layanan</span>
            <h2 class="section-title">Apa yang Saya Tawarkan</h2>
            <p class="section-subtitle">Solusi teknologi untuk kebutuhan pendidikan Anda</p>
        </div>
        <div class="row g-4">
            @php
            $services = [
                ['icon'=>'bi-globe2',          'color'=>'#2563eb', 'bg'=>'#dbeafe', 'title'=>'Website Sekolah',          'desc'=>'Website profesional untuk sekolah dengan fitur lengkap dan tampilan modern.'],
                ['icon'=>'bi-database-fill',   'color'=>'#7c3aed', 'bg'=>'#ede9fe', 'title'=>'Sistem Informasi',         'desc'=>'Aplikasi manajemen data siswa, guru, dan administrasi sekolah terintegrasi.'],
                ['icon'=>'bi-camera-video-fill','color'=>'#059669', 'bg'=>'#d1fae5', 'title'=>'Webinar Teknologi & AI',  'desc'=>'Pelatihan online seputar AI, web development, dan digitalisasi pendidikan.'],
                ['icon'=>'bi-file-earmark-text-fill','color'=>'#dc2626','bg'=>'#fee2e2','title'=>'Digitalisasi Administrasi','desc'=>'Transformasi administrasi sekolah dari manual ke sistem digital yang efisien.'],
                ['icon'=>'bi-robot',           'color'=>'#d97706', 'bg'=>'#fef3c7', 'title'=>'Konsultasi AI',           'desc'=>'Konsultasi pemanfaatan AI untuk mendukung layanan pendidikan modern.'],
                ['icon'=>'bi-headset',         'color'=>'#0891b2', 'bg'=>'#cffafe', 'title'=>'Konsultasi Teknologi',    'desc'=>'Pendampingan dan konsultasi teknologi pendidikan untuk sekolah dan instansi.'],
            ];
            @endphp
            @foreach($services as $s)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4">
                    <div style="width:48px;height:48px;background:{{ $s['bg'] }};border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
                        <i class="{{ $s['icon'] }}" style="font-size:1.3rem;color:{{ $s['color'] }};"></i>
                    </div>
                    <h6 class="fw-bold mb-2">{{ $s['title'] }}</h6>
                    <p class="text-muted small mb-0" style="line-height:1.7;">{{ $s['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ── Portofolio ─────────────────────────────────────────── -->
@if($portfolios->count())
<section class="py-5" style="background:#f9fafb;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Portofolio</span>
            <h2 class="section-title">Project Terbaru</h2>
            <p class="section-subtitle">Beberapa project yang telah dikembangkan</p>
        </div>
        <div class="row g-4">
            @foreach($portfolios as $portfolio)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($portfolio->image)
                    <img src="{{ asset('storage/'.$portfolio->image) }}" class="card-img-top" alt="{{ $portfolio->title }}" style="height:200px;object-fit:cover;border-radius:18px 18px 0 0;">
                    @else
                    <div style="height:200px;background:linear-gradient(135deg,#dbeafe,#ede9fe);border-radius:18px 18px 0 0;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-code-square" style="font-size:3rem;color:#a5b4fc;"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2">{{ $portfolio->title }}</h5>
                        <p class="text-muted small mb-3" style="line-height:1.7;">{{ Str::limit($portfolio->description, 100) }}</p>
                        @if($portfolio->tech_stack)
                        <div class="mb-3">
                            @foreach($portfolio->tech_stack_array as $tech)
                            <span class="badge rounded-pill me-1 mb-1" style="background:#f3f4f6;color:#374151;font-weight:600;font-size:0.75rem;border:1px solid #e5e7eb;">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif
                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-primary btn-sm">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('portfolio.index') }}" class="btn btn-outline-dark">
                Lihat Semua Portofolio <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ── Webinar ─────────────────────────────────────────────── -->
@if($webinars->count())
<section class="py-5" style="background:#ffffff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Webinar</span>
            <h2 class="section-title">Webinar Mendatang</h2>
            <p class="section-subtitle">Ikuti webinar gratis dan berbayar seputar teknologi pendidikan</p>
        </div>
        <div class="row g-4">
            @foreach($webinars as $webinar)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="badge rounded-pill" style="{{ $webinar->type==='free' ? 'background:#d1fae5;color:#065f46;' : 'background:#dbeafe;color:#1e40af;' }} font-weight:700;">
                            {{ $webinar->type==='free' ? 'Gratis' : 'Rp '.number_format($webinar->price,0,',','.') }}
                        </span>
                        <span class="badge rounded-pill" style="background:#fef3c7;color:#92400e;font-weight:600;">
                            {{ ['upcoming'=>'Akan Datang','ongoing'=>'Berlangsung','completed'=>'Selesai'][$webinar->status] ?? $webinar->status }}
                        </span>
                    </div>
                    <h5 class="fw-bold mb-2">{{ $webinar->title }}</h5>
                    <p class="text-muted small mb-3" style="line-height:1.7;">{{ Str::limit($webinar->description, 100) }}</p>
                    <div class="mt-auto">
                        @if($webinar->event_date)
                        <div class="small text-muted mb-1"><i class="bi bi-calendar3 me-1"></i>{{ $webinar->event_date->format('d M Y') }}</div>
                        @endif
                        @if($webinar->platform)
                        <div class="small text-muted mb-3"><i class="bi bi-camera-video me-1"></i>{{ $webinar->platform }}</div>
                        @endif
                        <a href="{{ route('webinar.show', $webinar->slug) }}" class="btn btn-outline-dark btn-sm w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('webinar.index') }}" class="btn btn-outline-dark">
                Lihat Semua Webinar <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ── CTA ────────────────────────────────────────────────── -->
<section class="py-5" style="background:linear-gradient(135deg,#1e3a5f,#1a56db);">
    <div class="container py-4 text-center">
        <h2 class="text-white fw-bold mb-3" style="letter-spacing:-0.02em;">Siap Berkolaborasi?</h2>
        <p class="mb-4" style="color:rgba(255,255,255,0.7);">Mari diskusikan kebutuhan teknologi pendidikan Anda bersama saya.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-accent btn-lg">
            Hubungi Saya Sekarang
        </a>
    </div>
</section>

@endsection
