@extends('layouts.app')

@section('title', $portfolio->title)

@section('content')

<section class="py-5 bg-light">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portofolio</a></li>
                <li class="breadcrumb-item active">{{ $portfolio->title }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                @if($portfolio->image)
                <img src="{{ asset('storage/'.$portfolio->image) }}" class="img-fluid rounded-3 mb-4 w-100" alt="{{ $portfolio->title }}" style="max-height:400px; object-fit:cover;">
                @else
                <div class="rounded-3 mb-4 d-flex align-items-center justify-content-center" style="height:300px; background:linear-gradient(135deg,#eff6ff,#dbeafe);">
                    <i class="bi bi-code-square" style="font-size:5rem; color:#93c5fd;"></i>
                </div>
                @endif

                <h1 class="fw-bold mb-3">{{ $portfolio->title }}</h1>
                <div class="text-muted lh-lg">
                    {!! nl2br(e($portfolio->description)) !!}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 sticky-top" style="top:80px;">
                    <h6 class="fw-bold mb-3">Detail Project</h6>

                    @if($portfolio->tech_stack)
                    <div class="mb-3">
                        <div class="small text-muted mb-2">Teknologi</div>
                        @foreach($portfolio->tech_stack_array as $tech)
                        <span class="badge bg-light text-dark border me-1 mb-1">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="d-grid gap-2 mt-3">
                        @if($portfolio->url)
                        <a href="{{ $portfolio->url }}" target="_blank" class="btn btn-primary">
                            <i class="bi bi-box-arrow-up-right me-2"></i>Lihat Project
                        </a>
                        @endif
                        @if($portfolio->github_url)
                        <a href="{{ $portfolio->github_url }}" target="_blank" class="btn btn-outline-dark">
                            <i class="bi bi-github me-2"></i>Source Code
                        </a>
                        @endif
                        <a href="{{ route('portfolio.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
