@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')

@php
    $siteName = \App\Models\Setting::get('site_name', 'Rahmad Widyo');
    $tagline = \App\Models\Setting::get('tagline', 'Praktisi IT & Administrasi Pendidikan');
    $aboutTitle = \App\Models\Setting::get('about_title', 'Tentang Saya');
    $aboutDescription = \App\Models\Setting::get('about_description');
    $photo = \App\Models\Setting::get('profile_photo');
    $organizations = \App\Models\Organization::orderBy('order')->get();
@endphp

<section class="py-5" style="background:linear-gradient(135deg,#0f172a,#1e3a5f); min-height:40vh; display:flex; align-items:center;">
    <div class="container py-4 text-center">
        <span class="hero-badge"><i class="bi bi-person me-1"></i>Tentang Saya</span>
        <h1 class="text-white fw-bold mt-2">{{ $siteName }}</h1>
        <p class="text-secondary fs-5">{{ $tagline }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4 text-center">
                <div style="width:200px; height:200px; border-radius:50%; overflow:hidden; border:4px solid #dbeafe; margin:0 auto 1.5rem; box-shadow:0 10px 30px rgba(37,99,235,0.15);">
                    @if($photo)
                    <img src="{{ asset('storage/'.$photo) }}" alt="{{ $siteName }}"
                        style="width:100%; height:100%; object-fit:cover; object-position:top;">
                    @else
                    <div style="width:100%; height:100%; background:linear-gradient(135deg,#eff6ff,#dbeafe); display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-person-circle" style="font-size:6rem; color:#93c5fd;"></i>
                    </div>
                    @endif
                </div>
                <h4 class="fw-bold">{{ $siteName }}</h4>
                <p class="text-muted">{{ $tagline }}</p>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    @if(\App\Models\Setting::get('email'))
                    <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-envelope me-1"></i>Email
                    </a>
                    @endif
                    @if(\App\Models\Setting::get('whatsapp'))
                    <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp') }}" class="btn btn-success btn-sm" target="_blank">
                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                    </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-8">
                <span class="section-badge">Profil</span>
                <h2 class="section-title mb-3">{{ $aboutTitle }}</h2>

                @if($aboutDescription)
                    @foreach(explode("\n", $aboutDescription) as $paragraph)
                        @if(trim($paragraph))
                        <p class="text-muted lh-lg mb-4">{{ trim($paragraph) }}</p>
                        @endif
                    @endforeach
                @else
                    <p class="text-muted lh-lg mb-4">
                        Saya adalah praktisi IT dan administrasi pendidikan yang memiliki minat pada pengembangan website, sistem informasi sekolah, serta pelatihan teknologi pendidikan.
                    </p>
                    <p class="text-muted lh-lg mb-4">
                        Saya fokus membantu sekolah dan instansi pendidikan dalam proses digitalisasi melalui pengembangan aplikasi berbasis web, webinar teknologi, dan pemanfaatan Artificial Intelligence (AI) untuk mendukung layanan pendidikan yang lebih modern dan efisien.
                    </p>
                @endif

                <!-- Organisasi -->
                @if($organizations->count())
                <h5 class="fw-bold mb-3 mt-4"><i class="bi bi-building me-2 text-primary"></i>Organisasi</h5>
                <div class="row g-3 mb-4">
                    @foreach($organizations as $org)
                    <div class="col-md-4">
                        <div class="card p-3 text-center">
                            @if($org->logo)
                            <img src="{{ asset('storage/'.$org->logo) }}" alt="{{ $org->name }}"
                                style="height:40px; width:auto; object-fit:contain; margin:0 auto 0.5rem;">
                            @else
                            <i class="bi bi-building fs-4 text-primary mb-2"></i>
                            @endif
                            <div class="small fw-semibold">{{ $org->name }}</div>
                            @if($org->role)
                            <div class="text-muted" style="font-size:0.75rem;">{{ $org->role }}</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Keahlian -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Keahlian</span>
            <h2 class="section-title">Skill & Teknologi</h2>
        </div>
        <div class="text-center">
            @php
            $skills = [
                ['name' => 'Artificial Intelligence (AI)', 'icon' => 'bi-robot', 'color' => '#7c3aed'],
                ['name' => 'Vibe Coding', 'icon' => 'bi-lightning', 'color' => '#f59e0b'],
                ['name' => 'PHP & Laravel', 'icon' => 'bi-code-slash', 'color' => '#ef4444'],
                ['name' => 'MySQL', 'icon' => 'bi-database', 'color' => '#0891b2'],
                ['name' => 'Microsoft Office', 'icon' => 'bi-file-earmark-word', 'color' => '#2563eb'],
                ['name' => 'Public Speaking', 'icon' => 'bi-mic', 'color' => '#059669'],
            ];
            @endphp
            @foreach($skills as $skill)
            <span class="skill-badge m-1">
                <i class="{{ $skill['icon'] }}" style="color:{{ $skill['color'] }};"></i>
                {{ $skill['name'] }}
            </span>
            @endforeach
        </div>
    </div>
</section>

<!-- Layanan -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Layanan</span>
            <h2 class="section-title">Yang Saya Kerjakan</h2>
        </div>
        <div class="row g-4">
            @php
            $services = [
                ['icon' => 'bi-globe', 'title' => 'Pembuatan Website Sekolah', 'color' => '#2563eb'],
                ['icon' => 'bi-database', 'title' => 'Sistem Informasi Pendidikan', 'color' => '#7c3aed'],
                ['icon' => 'bi-camera-video', 'title' => 'Webinar Teknologi & AI', 'color' => '#059669'],
                ['icon' => 'bi-file-earmark-text', 'title' => 'Digitalisasi Administrasi Sekolah', 'color' => '#dc2626'],
                ['icon' => 'bi-headset', 'title' => 'Konsultasi Teknologi Pendidikan', 'color' => '#0891b2'],
            ];
            @endphp
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 h-100">
                    <div style="width:48px; height:48px; background:{{ $service['color'] }}15; border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:1rem;">
                        <i class="{{ $service['icon'] }}" style="font-size:1.3rem; color:{{ $service['color'] }};"></i>
                    </div>
                    <h6 class="fw-bold mb-0">{{ $service['title'] }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
