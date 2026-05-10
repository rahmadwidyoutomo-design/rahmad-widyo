@extends('layouts.admin')

@section('title', 'Webinar')
@section('breadcrumb', 'Kelola Webinar')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Webinar</h5>
    <a href="{{ route('admin.webinar.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Webinar
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($webinars->count())
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Judul</th>
                        <th>Topik</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($webinars as $webinar)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $webinar->title }}</div>
                            <div class="text-muted small">{{ $webinar->platform }}</div>
                        </td>
                        <td class="small">{{ $webinar->topic }}</td>
                        <td>
                            @if($webinar->type === 'free')
                            <span class="badge bg-success rounded-pill">Gratis</span>
                            @else
                            <span class="badge bg-primary rounded-pill">Rp {{ number_format($webinar->price,0,',','.') }}</span>
                            @endif
                        </td>
                        <td>
                            @php
                            $colors = ['upcoming'=>'warning','ongoing'=>'success','completed'=>'secondary','draft'=>'light'];
                            $labels = ['upcoming'=>'Akan Datang','ongoing'=>'Berlangsung','completed'=>'Selesai','draft'=>'Draft'];
                            @endphp
                            <span class="badge bg-{{ $colors[$webinar->status] ?? 'secondary' }} text-dark rounded-pill">
                                {{ $labels[$webinar->status] ?? $webinar->status }}
                            </span>
                        </td>
                        <td class="small text-muted">
                            {{ $webinar->event_date ? $webinar->event_date->format('d M Y') : '-' }}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.webinar.edit', $webinar) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.webinar.destroy', $webinar) }}" method="POST"
                                    onsubmit="return confirm('Hapus webinar ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $webinars->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-camera-video fs-1 d-block mb-3"></i>
            <p>Belum ada webinar. <a href="{{ route('admin.webinar.create') }}">Tambah sekarang</a></p>
        </div>
        @endif
    </div>
</div>

@endsection
