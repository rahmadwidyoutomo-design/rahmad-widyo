<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        :root {
            --sidebar-width: 260px;
            --primary: #2563eb;
            --dark: #0f172a;
        }

        body { background: #f1f5f9; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--dark);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s;
        }
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand h5 {
            color: #fff;
            font-weight: 800;
            margin: 0;
        }
        .sidebar-brand small { color: #64748b; }

        .sidebar-nav { padding: 1rem 0; }
        .nav-section {
            padding: 0.5rem 1.5rem 0.25rem;
            font-size: 0.7rem;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 1.5rem;
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 0;
            transition: all 0.2s;
            text-decoration: none;
        }
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.05);
            color: #fff;
        }
        .sidebar .nav-link.active {
            background: rgba(37,99,235,0.2);
            color: #60a5fa;
            border-right: 3px solid #2563eb;
        }
        .sidebar .nav-link i { font-size: 1.1rem; width: 20px; }

        /* Main content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Cards */
        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 16px 16px 0 0 !important;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        /* Table */
        .table th {
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Form */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            padding: 0.6rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }
        .btn { border-radius: 10px; font-weight: 500; }
        .btn-primary { background: var(--primary); border-color: var(--primary); }

        /* Alert */
        .alert { border-radius: 12px; border: none; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <h5><i class="bi bi-code-slash me-2 text-primary"></i>Admin Panel</h5>
        <small>Rahmad Widyo</small>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">Menu Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="nav-section mt-2">Konten</div>
        <a href="{{ route('admin.about.index') }}" class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <i class="bi bi-person-lines-fill"></i> Tentang Saya
        </a>
        <a href="{{ route('admin.portfolio.index') }}" class="nav-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
            <i class="bi bi-grid"></i> Portofolio
        </a>
        <a href="{{ route('admin.webinar.index') }}" class="nav-link {{ request()->routeIs('admin.webinar.*') ? 'active' : '' }}">
            <i class="bi bi-camera-video"></i> Webinar
        </a>

        <div class="nav-section mt-2">Komunikasi</div>
        <a href="{{ route('admin.contact.index') }}" class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
            <i class="bi bi-chat-dots"></i> Pesan Masuk
            @php $unread = \App\Models\Contact::where('status','unread')->count(); @endphp
            @if($unread > 0)
            <span class="badge bg-danger rounded-pill ms-auto">{{ $unread }}</span>
            @endif
        </a>

        <div class="nav-section mt-2">Sistem</div>
        <a href="{{ route('admin.setting.index') }}" class="nav-link {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>

        <div class="nav-section mt-2">Lainnya</div>
        <a href="{{ route('home') }}" target="_blank" class="nav-link">
            <i class="bi bi-box-arrow-up-right"></i> Lihat Website
        </a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
            @csrf
            <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent" style="color:#94a3b8;">
                <i class="bi bi-box-arrow-left"></i> Logout
            </button>
        </form>
    </nav>
</aside>

<!-- Main Content -->
<div class="main-content">
    <!-- Topbar -->
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm btn-light d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="bi bi-list fs-5"></i>
            </button>
            <div>
                <h6 class="mb-0 fw-semibold">@yield('title', 'Dashboard')</h6>
                <small class="text-muted">@yield('breadcrumb', 'Admin Panel')</small>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <div style="width:36px; height:36px; background:#eff6ff; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-person text-primary"></i>
                </div>
                <div class="d-none d-md-block">
                    <div class="small fw-semibold">{{ auth()->user()->name }}</div>
                    <div class="text-muted" style="font-size:0.75rem;">Administrator</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="p-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
