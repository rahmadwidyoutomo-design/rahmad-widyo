@extends('layouts.app')

@section('title', $webinar->title)

@section('content')

<section class="py-5 bg-light">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('webinar.index') }}">Webinar</a></li>
                <li class="breadcrumb-item active">{{ $webinar->title }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                @if($webinar->image)
                <img src="{{ asset('storage/'.$webinar->image) }}" class="img-fluid rounded-3 mb-4 w-100" alt="{{ $webinar->title }}" style="max-height:400px; object-fit:cover;">
                @else
                <div class="rounded-3 mb-4 d-flex align-items-center justify-content-center" style="height:300px; background:linear-gradient(135deg,#f0fdf4,#dcfce7);">
                    <i class="bi bi-camera-video" style="font-size:5rem; color:#86efac;"></i>
                </div>
                @endif

                <div class="d-flex gap-2 mb-3">
                    <span class="badge {{ $webinar->type === 'free' ? 'bg-success' : 'bg-primary' }} rounded-pill fs-6">
                        {{ $webinar->type === 'free' ? 'Gratis' : 'Rp '.number_format($webinar->price,0,',','.') }}
                    </span>
                </div>

                <h1 class="fw-bold mb-3">{{ $webinar->title }}</h1>
                <div class="text-muted lh-lg">
                    {!! nl2br(e($webinar->description)) !!}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 sticky-top" style="top:80px;">
                    <h6 class="fw-bold mb-3">Info Webinar</h6>

                    <ul class="list-unstyled">
                        <li class="mb-2 small">
                            <i class="bi bi-tag me-2 text-primary"></i>
                            <strong>Topik:</strong> {{ $webinar->topic }}
                        </li>
                        @if($webinar->event_date)
                        <li class="mb-2 small">
                            <i class="bi bi-calendar me-2 text-primary"></i>
                            <strong>Tanggal:</strong> {{ $webinar->event_date->format('d M Y, H:i') }} WIB
                        </li>
                        @endif
                        @if($webinar->platform)
                        <li class="mb-2 small">
                            <i class="bi bi-camera-video me-2 text-primary"></i>
                            <strong>Platform:</strong> {{ $webinar->platform }}
                        </li>
                        @endif
                        <li class="mb-2 small">
                            <i class="bi bi-cash me-2 text-primary"></i>
                            <strong>Harga:</strong>
                            {{ $webinar->type === 'free' ? 'Gratis' : 'Rp '.number_format($webinar->price,0,',','.') }}
                        </li>
                    </ul>

                    <div class="d-grid gap-2 mt-3">
                        @if($webinar->registration_url && in_array($webinar->status, ['upcoming','ongoing']))
                        <a href="{{ $webinar->registration_url }}" target="_blank" class="btn btn-primary">
                            <i class="bi bi-pencil-square me-2"></i>Daftar Sekarang
                        </a>
                        @endif
                        <a href="{{ route('webinar.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
