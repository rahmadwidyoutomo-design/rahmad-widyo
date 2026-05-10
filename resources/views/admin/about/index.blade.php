@extends('layouts.admin')

@section('title', 'Tentang Saya')
@section('breadcrumb', 'Kelola halaman Tentang Saya')

@section('content')

<div class="mb-4">
    <h5 class="fw-bold mb-0">Kelola Halaman Tentang Saya</h5>
    <p class="text-muted small mb-0">Edit foto profil, deskripsi, dan organisasi/mitra yang ditampilkan di halaman Tentang Saya.</p>
</div>

<div class="row g-4">
    <!-- Profil & Deskripsi -->
    <div class="col-lg-8">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Foto Profil -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-person-circle me-2 text-primary"></i>Foto Profil
                </div>
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @php $photo = $settings['profile_photo'] ?? null; @endphp
                            <div style="width:120px; height:120px; border-radius:50%; overflow:hidden; border:3px solid #dbeafe; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                                @if($photo)
                                <img src="{{ asset('storage/'.$photo) }}" alt="Foto Profil" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                <i class="bi bi-person-circle" style="font-size:4rem; color:#93c5fd;"></i>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label fw-semibold small">Upload Foto Baru</label>
                            <input type="file" name="profile_photo" class="form-control" accept="image/*">
                            <div class="form-text">Format: JPG, PNG, WebP. Maksimal 2MB. Rekomendasi: foto persegi.</div>
                            @if($photo)
                            <a href="{{ route('admin.about.delete-photo') }}" class="btn btn-outline-danger btn-sm mt-2"
                               onclick="return confirm('Yakin ingin menghapus foto profil?')">
                                <i class="bi bi-trash me-1"></i>Hapus Foto
                            </a>
                            @endif
                        </div>
                    </div>
                    @error('profile_photo')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi Tentang Saya -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-file-text me-2 text-success"></i>Deskripsi Tentang Saya
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Judul Bagian</label>
                        <input type="text" name="about_title" class="form-control"
                            value="{{ $settings['about_title'] ?? 'Tentang Saya' }}"
                            placeholder="Tentang Saya">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Deskripsi / Bio</label>
                        <textarea name="about_description" rows="6" class="form-control"
                            placeholder="Tuliskan deskripsi tentang diri Anda...">{{ $settings['about_description'] ?? '' }}</textarea>
                        <div class="form-text">Gunakan baris baru untuk memisahkan paragraf. Teks ini akan ditampilkan di halaman Tentang Saya.</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-2"></i>Simpan Perubahan
            </button>
        </form>
    </div>

    <!-- Preview -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-eye me-2"></i>Preview
            </div>
            <div class="card-body text-center">
                <div style="width:100px; height:100px; border-radius:50%; overflow:hidden; border:3px solid #dbeafe; margin:0 auto 1rem; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                    @if($photo)
                    <img src="{{ asset('storage/'.$photo) }}" alt="Preview" style="width:100%; height:100%; object-fit:cover;">
                    @else
                    <i class="bi bi-person-circle" style="font-size:3rem; color:#93c5fd;"></i>
                    @endif
                </div>
                <h6 class="fw-bold">{{ $settings['site_name'] ?? 'Rahmad Widyo' }}</h6>
                <p class="text-muted small">{{ $settings['tagline'] ?? 'Praktisi IT & Administrasi Pendidikan' }}</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Tips
            </div>
            <div class="card-body">
                <ul class="small text-muted ps-3 mb-0">
                    <li class="mb-1">Foto profil sebaiknya berukuran persegi (1:1)</li>
                    <li class="mb-1">Deskripsi yang baik terdiri dari 2-3 paragraf</li>
                    <li class="mb-1">Tambahkan organisasi/mitra untuk menunjukkan kredibilitas</li>
                    <li>Logo organisasi sebaiknya berformat PNG transparan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Organisasi / Mitra -->
<div class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-0"><i class="bi bi-building me-2 text-primary"></i>Organisasi / Mitra</h5>
            <p class="text-muted small mb-0">Kelola daftar organisasi atau mitra yang ditampilkan di halaman Tentang Saya.</p>
        </div>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addOrgModal">
            <i class="bi bi-plus-circle me-1"></i>Tambah Organisasi
        </button>
    </div>

    <div class="card">
        <div class="card-body p-0">
            @if($organizations->count())
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Logo</th>
                            <th>Nama</th>
                            <th>Jabatan/Peran</th>
                            <th>Urutan</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $org)
                        <tr>
                            <td class="ps-4">
                                <div style="width:40px; height:40px; border-radius:8px; overflow:hidden; background:#f8fafc; display:flex; align-items:center; justify-content:center; border:1px solid #e2e8f0;">
                                    @if($org->logo)
                                    <img src="{{ asset('storage/'.$org->logo) }}" alt="{{ $org->name }}" style="width:100%; height:100%; object-fit:contain; padding:4px;">
                                    @else
                                    <i class="bi bi-building text-muted"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="fw-semibold small">{{ $org->name }}</td>
                            <td class="small text-muted">{{ $org->role ?? '-' }}</td>
                            <td class="small">{{ $org->order }}</td>
                            <td class="text-end pe-4">
                                <button class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editOrgModal{{ $org->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.about.organization.destroy', $org) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus organisasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editOrgModal{{ $org->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.about.organization.update', $org) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h6 class="modal-title fw-bold">Edit Organisasi</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold small">Nama Organisasi <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $org->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold small">Jabatan / Peran</label>
                                                <input type="text" name="role" class="form-control" value="{{ $org->role }}" placeholder="Contoh: Anggota, Ketua, dll">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold small">Logo</label>
                                                @if($org->logo)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/'.$org->logo) }}" alt="{{ $org->name }}" style="height:40px;">
                                                    <span class="small text-muted ms-2">Logo saat ini</span>
                                                </div>
                                                @endif
                                                <input type="file" name="logo" class="form-control" accept="image/*">
                                                <div class="form-text">Kosongkan jika tidak ingin mengubah logo.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold small">Urutan</label>
                                                <input type="number" name="order" class="form-control" value="{{ $org->order }}" min="0">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save me-1"></i>Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5 text-muted">
                <i class="bi bi-building fs-1 d-block mb-2"></i>
                <p class="mb-0">Belum ada organisasi. Klik tombol "Tambah Organisasi" untuk menambahkan.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Organization Modal -->
<div class="modal fade" id="addOrgModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.about.organization.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title fw-bold">Tambah Organisasi</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Nama Organisasi <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: Relawan TIK Kalbar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Jabatan / Peran</label>
                        <input type="text" name="role" class="form-control" placeholder="Contoh: Anggota, Ketua, dll">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Logo Organisasi</label>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, WebP, SVG. Maksimal 1MB.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Urutan Tampil</label>
                        <input type="number" name="order" class="form-control" value="0" min="0">
                        <div class="form-text">Angka lebih kecil tampil lebih dulu.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
