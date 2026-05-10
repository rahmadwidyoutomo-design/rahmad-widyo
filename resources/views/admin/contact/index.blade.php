@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('breadcrumb', 'Kelola Pesan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Pesan Masuk</h5>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($contacts->count())
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Pengirim</th>
                        <th>Subjek / Pesan</th>
                        <th>Status</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr class="{{ $contact->status === 'unread' ? 'table-warning' : '' }}">
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold {{ $contact->status === 'unread' ? '' : 'fw-normal' }}">
                                {{ $contact->name }}
                            </div>
                            <div class="text-muted small">{{ $contact->email }}</div>
                        </td>
                        <td class="small">
                            @if($contact->subject)
                            <div class="fw-semibold">{{ $contact->subject }}</div>
                            @endif
                            <div class="text-muted">{{ Str::limit($contact->message, 60) }}</div>
                        </td>
                        <td>
                            @if($contact->status === 'unread')
                            <span class="badge bg-danger rounded-pill">Belum Dibaca</span>
                            @elseif($contact->status === 'read')
                            <span class="badge bg-secondary rounded-pill">Dibaca</span>
                            @else
                            <span class="badge bg-success rounded-pill">Dibalas</span>
                            @endif
                        </td>
                        <td class="small text-muted">{{ $contact->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.contact.show', $contact) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST"
                                    onsubmit="return confirm('Hapus pesan ini?')">
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
        <div class="p-3">{{ $contacts->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
            <p>Belum ada pesan masuk</p>
        </div>
        @endif
    </div>
</div>

@endsection
