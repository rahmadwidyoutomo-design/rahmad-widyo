@extends('layouts.admin')

@section('title', 'Edit Webinar')
@section('breadcrumb', 'Webinar / Edit')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Edit Webinar</h5>
    <a href="{{ route('admin.webinar.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('admin.webinar.update', $webinar) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.webinar._form')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i>Update
                </button>
                <a href="{{ route('admin.webinar.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
