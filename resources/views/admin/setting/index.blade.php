@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('breadcrumb', 'Pengaturan Website')

@section('content')

<div class="mb-4">
    <h5 class="fw-bold mb-0">Pengaturan Website</h5>
</div>

<form action="{{ route('admin.setting.update') }}" method="POST">
    @csrf
    <div class="row g-4">
        <!-- Identitas -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-person-badge me-2 text-primary"></i>Identitas Website
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Nama Website</label>
                            <input type="text" name="site_name" class="form-control"
                                value="{{ $settings['site_name'] ?? 'Rahmad Widyo' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Tagline</label>
                            <input type="text" name="tagline" class="form-control"
                                value="{{ $settings['tagline'] ?? '' }}"
                                placeholder="Praktisi IT & Administrasi Pendidikan">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Deskripsi Singkat</label>
                            <textarea name="about_short" rows="3" class="form-control"
                                placeholder="Deskripsi singkat tentang Anda...">{{ $settings['about_short'] ?? '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Meta Description (SEO)</label>
                            <textarea name="meta_description" rows="2" class="form-control"
                                placeholder="Deskripsi untuk mesin pencari...">{{ $settings['meta_description'] ?? '' }}</textarea>
                            <div class="form-text">Maksimal 300 karakter untuk SEO optimal.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-telephone me-2 text-success"></i>Informasi Kontak & Sosial Media
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-envelope me-1 text-primary"></i>Email
                            </label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $settings['email'] ?? '' }}"
                                placeholder="email@contoh.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-whatsapp me-1 text-success"></i>WhatsApp (nomor saja)
                            </label>
                            <input type="text" name="whatsapp" class="form-control"
                                value="{{ $settings['whatsapp'] ?? '' }}"
                                placeholder="628123456789">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-instagram me-1 text-danger"></i>Instagram (username)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="instagram" class="form-control"
                                    value="{{ $settings['instagram'] ?? '' }}"
                                    placeholder="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-linkedin me-1 text-primary"></i>LinkedIn (URL)
                            </label>
                            <input type="url" name="linkedin" class="form-control"
                                value="{{ $settings['linkedin'] ?? '' }}"
                                placeholder="https://linkedin.com/in/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-facebook me-1" style="color:#1877f2"></i>Facebook (URL)
                            </label>
                            <input type="url" name="facebook" class="form-control"
                                value="{{ $settings['facebook'] ?? '' }}"
                                placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">
                                <i class="bi bi-youtube me-1 text-danger"></i>YouTube (URL)
                            </label>
                            <input type="url" name="youtube" class="form-control"
                                value="{{ $settings['youtube'] ?? '' }}"
                                placeholder="https://youtube.com/@...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Informasi
                </div>
                <div class="card-body">
                    <p class="small text-muted">Pengaturan ini akan mempengaruhi tampilan dan informasi yang ditampilkan di seluruh halaman website.</p>
                    <ul class="small text-muted ps-3">
                        <li class="mb-1">Nama & tagline tampil di header</li>
                        <li class="mb-1">Meta description untuk SEO</li>
                        <li class="mb-1">Kontak tampil di footer & halaman kontak</li>
                        <li>WhatsApp format: 628xxx (tanpa +)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-2"></i>Simpan Pengaturan
        </button>
    </div>
</form>

@endsection
