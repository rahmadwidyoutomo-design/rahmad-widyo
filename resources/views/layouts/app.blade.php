<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ \App\Models\Setting::get('meta_description', 'Rahmad Widyo - Praktisi IT & Administrasi Pendidikan') }}">
    <title>@yield('title', \App\Models\Setting::get('site_name', 'Rahmad Widyo')) - {{ \App\Models\Setting::get('tagline', 'Praktisi IT & Administrasi Pendidikan') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:      #1a56db;
            --primary-light:#eff6ff;
            --accent:       #2563eb;
            --accent-light: #dbeafe;
            --dark:         #111827;
            --body-bg:      #f9fafb;
            --card-bg:      #ffffff;
            --border:       #e5e7eb;
            --text-muted:   #6b7280;
            --footer-bg:    #f3f4f6;
            --footer-dark:  #1e3a5f;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: var(--body-bg); color: var(--dark); }

        /* ── Navbar ─────────────────────────────── */
        .navbar {
            background: #fff !important;
            border-bottom: 1px solid var(--border);
            padding: 0.75rem 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        .navbar-brand img { height: 40px; }
        .navbar-brand span {
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--dark);
            letter-spacing: -0.02em;
        }
        .nav-link {
            font-weight: 500;
            font-size: 0.9rem;
            color: #374151 !important;
            padding: 0.45rem 0.9rem !important;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            background: var(--primary-light);
            color: var(--primary) !important;
        }
        .btn-nav-cta {
            background: var(--accent);
            color: #fff !important;
            font-weight: 700;
            border-radius: 50px;
            padding: 0.45rem 1.3rem !important;
            border: none;
        }
        .btn-nav-cta:hover { background: #1e40af; color: #fff !important; }

        /* ── Hero ───────────────────────────────── */
        .hero-section {
            background: linear-gradient(160deg, #eff6ff 0%, #dbeafe 40%, #bfdbfe 100%);
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, transparent 70%);
            top: -100px; right: 0;
            border-radius: 50%;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #fff;
            border: 1.5px solid var(--border);
            color: var(--text-muted);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }
        .hero-badge span { color: var(--primary); }
        .hero-title {
            font-size: clamp(2.2rem, 4.5vw, 3.5rem);
            font-weight: 800;
            color: var(--dark);
            line-height: 1.15;
            letter-spacing: -0.03em;
            margin-bottom: 1.2rem;
        }
        .hero-title .highlight {
            color: var(--accent);
            position: relative;
        }
        .hero-subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            line-height: 1.75;
            margin-bottom: 2rem;
            max-width: 480px;
        }
        .hero-photo-wrap {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        .hero-photo-bg {
            width: 380px; height: 420px;
            background: linear-gradient(160deg, #fde68a, #fbbf24);
            border-radius: 40% 60% 60% 40% / 40% 40% 60% 60%;
            position: absolute;
            bottom: 0;
        }
        .hero-photo-img {
            position: relative;
            z-index: 2;
            height: 420px;
            object-fit: cover;
            object-position: top;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.15));
        }
        .hero-chip {
            position: absolute;
            background: #fff;
            border-radius: 14px;
            padding: 0.6rem 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 3;
            white-space: nowrap;
        }
        .hero-chip-1 { top: 30%; left: -10px; }
        .hero-chip-2 { top: 55%; right: -10px; }
        .hero-stat {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 0.75rem 1.2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .hero-stat-num { font-size: 1.5rem; font-weight: 800; color: var(--dark); line-height: 1; }
        .hero-stat-label { font-size: 0.75rem; color: var(--text-muted); font-weight: 500; }

        /* ── Sections ───────────────────────────── */
        .section-badge {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary);
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        .section-title {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }
        .section-subtitle { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 2.5rem; }

        /* ── Cards ──────────────────────────────── */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 18px;
            transition: all 0.25s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.08);
            border-color: var(--primary);
        }

        /* ── Skill badges ───────────────────────── */
        .skill-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #fff;
            color: var(--dark);
            padding: 0.45rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin: 0.25rem;
            border: 1.5px solid var(--border);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        /* ── Buttons ────────────────────────────── */
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            border-radius: 50px;
            font-weight: 700;
            padding: 0.6rem 1.6rem;
        }
        .btn-primary:hover { background: #1e40af; border-color: #1e40af; }
        .btn-accent {
            background: var(--accent);
            border: none;
            border-radius: 50px;
            font-weight: 700;
            color: #fff;
            padding: 0.6rem 1.6rem;
        }
        .btn-accent:hover { background: #1e40af; color: #fff; }
        .btn-outline-dark {
            border-radius: 50px;
            font-weight: 600;
            padding: 0.6rem 1.6rem;
        }

        /* ── Footer ─────────────────────────────── */
        footer {
            background: var(--footer-bg);
            border-top: 1px solid var(--border);
            color: #374151;
        }
        .footer-brand-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.02em;
        }
        .footer-desc { font-size: 0.875rem; color: var(--text-muted); line-height: 1.7; }
        .footer-heading {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        .footer-link {
            display: block;
            font-size: 0.875rem;
            color: var(--text-muted);
            padding: 0.2rem 0;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-link:hover { color: var(--primary); }
        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 0.6rem;
        }
        .footer-contact-item a { color: var(--text-muted); text-decoration: none; }
        .footer-contact-item a:hover { color: var(--primary); }
        .footer-icon-wrap {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.9rem; flex-shrink: 0;
        }
        .social-row { display: flex; gap: 0.5rem; margin-top: 1rem; }
        .social-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            background: #fff;
            border: 1.5px solid var(--border);
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.2s;
        }
        .social-icon:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .social-icon.yt:hover  { background: #ff0000; color: #fff; border-color: #ff0000; }
        .social-icon.ig:hover  { background: #e1306c; color: #fff; border-color: #e1306c; }
        .social-icon.fb:hover  { background: #1877f2; color: #fff; border-color: #1877f2; }
        .social-icon.li:hover  { background: #0a66c2; color: #fff; border-color: #0a66c2; }
        .social-icon.wa:hover  { background: #25d366; color: #fff; border-color: #25d366; }
        .social-icon.em:hover  { background: var(--primary); color: #fff; border-color: var(--primary); }
        .footer-bottom-bar {
            background: #0f172a;
            color: #9ca3af;
            font-size: 0.8rem;
            padding: 1rem 0;
        }
        .footer-bottom-bar a { color: #9ca3af; text-decoration: none; }
        .footer-bottom-bar a:hover { color: #fff; }

        /* ── Alert ──────────────────────────────── */
        .alert { border-radius: 12px; border: none; }

        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .hero-photo-bg { width: 280px; height: 320px; }
            .hero-photo-img { height: 320px; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-8px); }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- ── Navbar ──────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('storage/logorahmad.png.png') }}" alt="Logo" onerror="this.style.display='none'">
            <span>Rahmad Widyo</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio.*') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">Portofolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('webinar.*') ? 'active' : '' }}" href="{{ route('webinar.index') }}">Webinar</a>
                </li>
            </ul>
            <a href="{{ route('contact.index') }}" class="btn btn-nav-cta ms-2">Kontak</a>
        </div>
    </div>
</nav>

<!-- Flash Messages -->
@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@yield('content')

<!-- ── Footer ──────────────────────────────────────────── -->
<footer class="pt-5 pb-0">
    <div class="container pb-5">
        <div class="row g-5">

            <!-- Col 1: Brand -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('storage/logorahmad.png.png') }}" alt="Logo" style="height:36px;" onerror="this.style.display='none'">
                    <span class="footer-brand-name">Rahmad Widyo</span>
                </div>
                <p class="footer-desc mb-4">Praktisi IT & Administrasi Pendidikan. Membangun solusi digital untuk sekolah dan pendidikan melalui teknologi modern dan AI.</p>
            </div>

            <!-- Col 2: Tautan -->
            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer-heading">Tautan</div>
                <a href="{{ route('about') }}" class="footer-link">Tentang Saya</a>
                <a href="{{ route('portfolio.index') }}" class="footer-link">Portofolio</a>
                <a href="{{ route('webinar.index') }}" class="footer-link">Webinar</a>
                <a href="{{ route('contact.index') }}" class="footer-link">Kontak</a>
            </div>

            <!-- Col 3: Layanan -->
            <div class="col-lg-3 col-md-3 col-6">
                <div class="footer-heading">Layanan</div>
                <span class="footer-link">Website Sekolah</span>
                <span class="footer-link">Sistem Informasi</span>
                <span class="footer-link">Webinar Teknologi</span>
                <span class="footer-link">Digitalisasi Sekolah</span>
                <span class="footer-link">Konsultasi IT & AI</span>
            </div>

            <!-- Col 4: Sosial Media Icons -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-heading">Ikuti Saya</div>
                <div class="d-flex flex-wrap gap-2">
                    @if(\App\Models\Setting::get('whatsapp'))
                    <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp') }}" target="_blank" class="social-icon wa" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('email'))
                    <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="social-icon em" title="Email"><i class="bi bi-envelope"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('instagram'))
                    <a href="https://instagram.com/{{ \App\Models\Setting::get('instagram') }}" target="_blank" class="social-icon ig" title="Instagram"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('facebook'))
                    <a href="{{ \App\Models\Setting::get('facebook') }}" target="_blank" class="social-icon fb" title="Facebook"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('linkedin'))
                    <a href="{{ \App\Models\Setting::get('linkedin') }}" target="_blank" class="social-icon li" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('youtube'))
                    <a href="{{ \App\Models\Setting::get('youtube') }}" target="_blank" class="social-icon yt" title="YouTube"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
                <div class="mt-3">
                    <a href="{{ route('contact.index') }}" class="btn btn-accent btn-sm px-4">
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom-bar">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-1">
            <span>&copy; {{ date('Y') }} Rahmad Widyo. All rights reserved.</span>
            <span>Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> menggunakan Laravel & PHP 8.2</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
