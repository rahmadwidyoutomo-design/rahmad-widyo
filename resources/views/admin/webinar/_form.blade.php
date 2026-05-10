@if($errors->any())
<div class="alert alert-danger mb-4">
    <ul class="mb-0 small">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row g-4">
    <div class="col-md-8">
        <div class="mb-3">
            <label class="form-label fw-semibold small">Judul <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $webinar->title ?? '') }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Deskripsi</label>
            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $webinar->description ?? '') }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Topik <span class="text-danger">*</span></label>
                <input type="text" name="topic" class="form-control @error('topic') is-invalid @enderror"
                    value="{{ old('topic', $webinar->topic ?? '') }}"
                    placeholder="AI, Laravel, Digitalisasi..." required>
                @error('topic')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Platform</label>
                <input type="text" name="platform" class="form-control @error('platform') is-invalid @enderror"
                    value="{{ old('platform', $webinar->platform ?? '') }}"
                    placeholder="Zoom, Google Meet...">
                @error('platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Tanggal & Waktu</label>
                <input type="datetime-local" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
                    value="{{ old('event_date', isset($webinar) && $webinar->event_date ? $webinar->event_date->format('Y-m-d\TH:i') : '') }}">
                @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Link Pendaftaran</label>
                <input type="url" name="registration_url" class="form-control @error('registration_url') is-invalid @enderror"
                    value="{{ old('registration_url', $webinar->registration_url ?? '') }}" placeholder="https://...">
                @error('registration_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label fw-semibold small">Gambar</label>
            @if(isset($webinar) && $webinar->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$webinar->image) }}" class="img-fluid rounded-3" style="max-height:150px;">
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Tipe</label>
            <select name="type" class="form-select @error('type') is-invalid @enderror" id="typeSelect">
                <option value="free" {{ old('type', $webinar->type ?? 'free') === 'free' ? 'selected' : '' }}>Gratis</option>
                <option value="paid" {{ old('type', $webinar->type ?? '') === 'paid' ? 'selected' : '' }}>Berbayar</option>
            </select>
            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3" id="priceField" style="{{ old('type', $webinar->type ?? 'free') === 'paid' ? '' : 'display:none;' }}">
            <label class="form-label fw-semibold small">Harga (Rp)</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price', $webinar->price ?? 0) }}" min="0">
            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Status</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="upcoming" {{ old('status', $webinar->status ?? 'upcoming') === 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                <option value="ongoing" {{ old('status', $webinar->status ?? '') === 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                <option value="completed" {{ old('status', $webinar->status ?? '') === 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="draft" {{ old('status', $webinar->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('typeSelect').addEventListener('change', function() {
    document.getElementById('priceField').style.display = this.value === 'paid' ? '' : 'none';
});
</script>
@endpush
