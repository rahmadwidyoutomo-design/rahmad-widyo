@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<section class="py-5" style="background:linear-gradient(135deg,#0f172a,#1e3a5f); min-height:35vh; display:flex; align-items:center;">
    <div class="container py-4 text-center">
        <span class="hero-badge"><i class="bi bi-chat me-1"></i>Kontak</span>
        <h1 class="text-white fw-bold mt-2">Hubungi Saya</h1>
        <p class="text-secondary">Mari diskusikan kebutuhan teknologi pendidikan Anda</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-5 justify-content-center">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <h5 class="fw-bold mb-4">Informasi Kontak</h5>

                <div class="d-flex align-items-start mb-4">
                    <div style="width:44px; height:44px; background:#eff6ff; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="bi bi-envelope text-primary fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-semibold small">Email</div>
                        <a href="mailto:rahmadwidyoutomo@gmail.com" class="text-muted small text-decoration-none">rahmadwidyoutomo@gmail.com</a>
                    </div>
                </div>

                @if(\App\Models\Setting::get('whatsapp'))
                <div class="d-flex align-items-start mb-4">
                    <div style="width:44px; height:44px; background:#f0fdf4; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="bi bi-whatsapp text-success fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-semibold small">WhatsApp</div>
                        <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp') }}" target="_blank" class="text-muted small text-decoration-none">
                            {{ \App\Models\Setting::get('whatsapp') }}
                        </a>
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('instagram'))
                <div class="d-flex align-items-start mb-4">
                    <div style="width:44px; height:44px; background:#fff1f2; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="bi bi-instagram text-danger fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-semibold small">Instagram</div>
                        <a href="https://instagram.com/{{ \App\Models\Setting::get('instagram') }}" target="_blank" class="text-muted small text-decoration-none">
                            {{ '@' . \App\Models\Setting::get('instagram') }}
                        </a>
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('linkedin'))
                <div class="d-flex align-items-start mb-4">
                    <div style="width:44px; height:44px; background:#eff6ff; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="bi bi-linkedin text-primary fs-5"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-semibold small">LinkedIn</div>
                        <a href="{{ \App\Models\Setting::get('linkedin') }}" target="_blank" class="text-muted small text-decoration-none">Lihat Profil</a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card p-4 p-md-5">
                    <h5 class="fw-bold mb-4">Kirim Pesan</h5>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 small">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Nama lengkap Anda" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="email@contoh.com" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Subjek</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                    value="{{ old('subject') }}" placeholder="Subjek pesan">
                                @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Pesan <span class="text-danger">*</span></label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
