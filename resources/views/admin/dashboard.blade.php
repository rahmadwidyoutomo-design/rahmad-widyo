@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Selamat datang kembali!')

@section('content')

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small mb-1">Total Portofolio</div>
                    <div class="fs-2 fw-bold">{{ $stats['portfolios'] }}</div>
                </div>
                <div style="width:50px; height:50px; background:#eff6ff; border-radius:14px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-grid text-primary fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small mb-1">Total Webinar</div>
                    <div class="fs-2 fw-bold">{{ $stats['webinars'] }}</div>
                </div>
                <div style="width:50px; height:50px; background:#f0fdf4; border-radius:14px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-camera-video text-success fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small mb-1">Total Pesan</div>
                    <div class="fs-2 fw-bold">{{ $stats['contacts'] }}</div>
                </div>
                <div style="width:50px; height:50px; background:#fef3c7; border-radius:14px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-chat-dots text-warning fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small mb-1">Pesan Belum Dibaca</div>
                    <div class="fs-2 fw-bold text-danger">{{ $stats['unread_contacts'] }}</div>
                </div>
                <div style="width:50px; height:50px; background:#fff1f2; border-radius:14px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-envelope-exclamation text-danger fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Messages -->
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-chat-dots me-2 text-primary"></i>Pesan Terbaru</span>
                <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($recentContacts->count())
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">Pengirim</th>
                                <th>Subjek</th>
                                <th>Status</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentContacts as $contact)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-semibold small">{{ $contact->name }}</div>
                                    <div class="text-muted" style="font-size:0.75rem;">{{ $contact->email }}</div>
                                </td>
                                <td class="small">{{ Str::limit($contact->subject ?? $contact->message, 40) }}</td>
                                <td>
                                    @if($contact->status === 'unread')
                                    <span class="badge bg-danger rounded-pill">Belum Dibaca</span>
                                    @elseif($contact->status === 'read')
                                    <span class="badge bg-secondary rounded-pill">Dibaca</span>
                                    @else
                                    <span class="badge bg-success rounded-pill">Dibalas</span>
                                    @endif
                                </td>
                                <td class="small text-muted">{{ $contact->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4 text-muted small">
                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>Belum ada pesan
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Upcoming Webinars -->
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-calendar-event me-2 text-success"></i>Webinar Mendatang</span>
                <a href="{{ route('admin.webinar.index') }}" class="btn btn-sm btn-outline-success">Kelola</a>
            </div>
            <div class="card-body">
                @if($upcomingWebinars->count())
                @foreach($upcomingWebinars as $webinar)
                <div class="d-flex align-items-start mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div style="width:40px; height:40px; background:#f0fdf4; border-radius:10px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="bi bi-camera-video text-success"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-semibold small">{{ $webinar->title }}</div>
                        <div class="text-muted" style="font-size:0.75rem;">
                            {{ $webinar->event_date ? $webinar->event_date->format('d M Y') : 'Tanggal belum ditentukan' }}
                        </div>
                        <span class="badge {{ $webinar->type === 'free' ? 'bg-success' : 'bg-primary' }} rounded-pill mt-1" style="font-size:0.7rem;">
                            {{ $webinar->type === 'free' ? 'Gratis' : 'Berbayar' }}
                        </span>
                    </div>
                </div>
                @endforeach
                @else
                <div class="text-center py-3 text-muted small">
                    <i class="bi bi-calendar-x fs-3 d-block mb-2"></i>Tidak ada webinar mendatang
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mt-4">
            <div class="card-header">
                <i class="bi bi-lightning me-2 text-warning"></i>Aksi Cepat
            </div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Portofolio
                </a>
                <a href="{{ route('admin.webinar.create') }}" class="btn btn-outline-success btn-sm">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Webinar
                </a>
                <a href="{{ route('admin.setting.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-gear me-2"></i>Pengaturan Website
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
