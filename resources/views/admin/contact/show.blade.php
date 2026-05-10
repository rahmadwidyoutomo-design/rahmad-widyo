@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('breadcrumb', 'Pesan / Detail')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Detail Pesan</h5>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-envelope me-2 text-primary"></i>
                {{ $contact->subject ?? 'Pesan dari ' . $contact->name }}
            </div>
            <div class="card-body p-4">
                <div class="bg-light rounded-3 p-4">
                    <p class="mb-0 lh-lg">{{ $contact->message }}</p>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                        <i class="bi bi-reply me-2"></i>Balas via Email
                    </a>
                    <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST"
                        onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person me-2"></i>Info Pengirim
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-3">
                        <div class="text-muted small">Nama</div>
                        <div class="fw-semibold">{{ $contact->name }}</div>
                    </li>
                    <li class="mb-3">
                        <div class="text-muted small">Email</div>
                        <div class="fw-semibold">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="text-muted small">Status</div>
                        @if($contact->status === 'unread')
                        <span class="badge bg-danger rounded-pill">Belum Dibaca</span>
                        @elseif($contact->status === 'read')
                        <span class="badge bg-secondary rounded-pill">Dibaca</span>
                        @else
                        <span class="badge bg-success rounded-pill">Dibalas</span>
                        @endif
                    </li>
                    <li>
                        <div class="text-muted small">Diterima</div>
                        <div class="fw-semibold">{{ $contact->created_at->format('d M Y, H:i') }}</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
