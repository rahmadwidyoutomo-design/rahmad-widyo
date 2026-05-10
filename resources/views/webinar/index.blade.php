@extends('layouts.app')

@section('title', 'Webinar')

@section('content')

<section class="py-5" style="background:linear-gradient(135deg,#0f172a,#1e3a5f); min-height:35vh; display:flex; align-items:center;">
    <div class="container py-4 text-center">
        <span class="hero-badge"><i class="bi bi-camera-video me-1"></i>Webinar</span>
        <h1 class="text-white fw-bold mt-2">Webinar & Pelatihan</h1>
        <p class="text-secondary">Webinar gratis dan berbayar seputar teknologi pendidikan</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <!-- Topics -->
        <div class="text-center mb-5">
            <p class="text-muted mb-3">Topik yang dibahas:</p>
            @php
            $topics = ['Artificial Intelligence (AI)', 'Website Development', 'Laravel & PHP', 'Teknologi Pendidikan', 'Digitalisasi Sekolah'];
            @endphp
            @foreach($topics as $topic)
            <span class="skill-badge">{{ $topic }}</span>
            @endforeach
        </div>

        @if($webinars->count())
        <div class="row g-4">
            @foreach($webinars as $webinar)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($webinar->image)
                    <img src="{{ asset('storage/'.$webinar->image) }}" class="card-img-top" alt="{{ $webinar->title }}" style="height:200px; object-fit:cover; border-radius:16px 16px 0 0;">
                    @else
                    <div style="height:200px; background:linear-gradient(135deg,#f0fdf4,#dcfce7); border-radius:16px 16px 0 0; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-camera-video" style="font-size:3.5rem; color:#86efac;"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge {{ $webinar->type === 'free' ? 'bg-success' : 'bg-primary' }} rounded-pill">
                                {{ $webinar->type === 'free' ? 'Gratis' : 'Rp '.number_format($webinar->price,0,',','.') }}
                            </span>
                            @php
                            $statusColors = ['upcoming'=>'warning','ongoing'=>'success','completed'=>'secondary'];
                            $statusLabels = ['upcoming'=>'Akan Datang','ongoing'=>'Berlangsung','completed'=>'Selesai'];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$webinar->status] ?? 'secondary' }} text-dark rounded-pill">
                                {{ $statusLabels[$webinar->status] ?? $webinar->status }}
                            </span>
                        </div>
                        <h5 class="fw-bold mb-2">{{ $webinar->title }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($webinar->description, 100) }}</p>
                        <div class="mt-auto">
                            @if($webinar->event_date)
                            <div class="small text-muted mb-1">
                                <i class="bi bi-calendar me-1"></i>{{ $webinar->event_date->format('d M Y, H:i') }} WIB
                            </div>
                            @endif
                            @if($webinar->platform)
                            <div class="small text-muted mb-3">
                                <i class="bi bi-camera-video me-1"></i>{{ $webinar->platform }}
                            </div>
                            @endif
                            <a href="{{ route('webinar.show', $webinar->slug) }}" class="btn btn-outline-primary btn-sm w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $webinars->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-camera-video-off" style="font-size:4rem; color:#cbd5e1;"></i>
            <h5 class="text-muted mt-3">Belum ada webinar</h5>
        </div>
        @endif
    </div>
</section>

@endsection
