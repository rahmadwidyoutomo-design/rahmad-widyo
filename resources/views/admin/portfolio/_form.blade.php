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
                value="{{ old('title', $portfolio->title ?? '') }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Deskripsi</label>
            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $portfolio->description ?? '') }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Teknologi (pisahkan dengan koma)</label>
            <input type="text" name="tech_stack" class="form-control @error('tech_stack') is-invalid @enderror"
                value="{{ old('tech_stack', $portfolio->tech_stack ?? '') }}"
                placeholder="PHP, Laravel, MySQL, Bootstrap">
            @error('tech_stack')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">URL Project</label>
                <input type="url" name="url" class="form-control @error('url') is-invalid @enderror"
                    value="{{ old('url', $portfolio->url ?? '') }}" placeholder="https://...">
                @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">GitHub URL</label>
                <input type="url" name="github_url" class="form-control @error('github_url') is-invalid @enderror"
                    value="{{ old('github_url', $portfolio->github_url ?? '') }}" placeholder="https://github.com/...">
                @error('github_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label fw-semibold small">Gambar</label>
            @if(isset($portfolio) && $portfolio->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$portfolio->image) }}" class="img-fluid rounded-3" style="max-height:150px;">
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Status</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="published" {{ old('status', $portfolio->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status', $portfolio->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Urutan Tampil</label>
            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                value="{{ old('order', $portfolio->order ?? 0) }}" min="0">
            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
