@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')

<section class="py-5" style="background:linear-gradient(135deg,#0f172a,#1e3a5f); min-height:35vh; display:flex; align-items:center;">
    <div class="container py-4 text-center">
        <span class="hero-badge"><i class="bi bi-grid me-1"></i>Portofolio</span>
        <h1 class="text-white fw-bold mt-2">Project Saya</h1>
        <p class="text-secondary">Kumpulan project yang telah dikembangkan</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        @if($portfolios->count())
        <div class="row g-4">
            @foreach($portfolios as $portfolio)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($portfolio->image)
                    <img src="{{ asset('storage/'.$portfolio->image) }}" class="card-img-top" alt="{{ $portfolio->title }}" style="height:220px; object-fit:cover; border-radius:16px 16px 0 0;">
                    @else
                    <div style="height:220px; background:linear-gradient(135deg,#eff6ff,#dbeafe); border-radius:16px 16px 0 0; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-code-square" style="font-size:4rem; color:#93c5fd;"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2">{{ $portfolio->title }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($portfolio->description, 120) }}</p>
                        @if($portfolio->tech_stack)
                        <div class="mb-3">
                            @foreach($portfolio->tech_stack_array as $tech)
                            <span class="badge bg-light text-dark border me-1 mb-1 small">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="d-flex gap-2 mt-auto">
                            <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-primary btn-sm flex-fill">
                                Detail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                            @if($portfolio->url)
                            <a href="{{ $portfolio->url }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                            @if($portfolio->github_url)
                            <a href="{{ $portfolio->github_url }}" target="_blank" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-github"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-folder-x" style="font-size:4rem; color:#cbd5e1;"></i>
            <h5 class="text-muted mt-3">Belum ada portofolio</h5>
        </div>
        @endif
    </div>
</section>

@endsection
