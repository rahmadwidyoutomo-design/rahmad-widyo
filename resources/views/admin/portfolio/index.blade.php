@extends('layouts.admin')

@section('title', 'Portofolio')
@section('breadcrumb', 'Kelola Portofolio')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Portofolio</h5>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Portofolio
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($portfolios->count())
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Judul</th>
                        <th>Teknologi</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $portfolio->title }}</div>
                            <div class="text-muted small">{{ Str::limit($portfolio->description, 60) }}</div>
                        </td>
                        <td>
                            @if($portfolio->tech_stack)
                            @foreach(array_slice($portfolio->tech_stack_array, 0, 3) as $tech)
                            <span class="badge bg-light text-dark border me-1 small">{{ $tech }}</span>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            @if($portfolio->status === 'published')
                            <span class="badge bg-success rounded-pill">Published</span>
                            @else
                            <span class="badge bg-secondary rounded-pill">Draft</span>
                            @endif
                        </td>
                        <td class="text-muted small">{{ $portfolio->order }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST"
                                    onsubmit="return confirm('Hapus portofolio ini?')">
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
        <div class="p-3">{{ $portfolios->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-grid fs-1 d-block mb-3"></i>
            <p>Belum ada portofolio. <a href="{{ route('admin.portfolio.create') }}">Tambah sekarang</a></p>
        </div>
        @endif
    </div>
</div>

@endsection
