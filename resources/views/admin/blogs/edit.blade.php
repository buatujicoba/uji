@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.blogs') }}">Blog</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="excerpt" class="form-label">Ringkasan</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Anda dapat menggunakan format markdown untuk penulisan konten.</small>
            </div>
            
            <div class="mb-3">
                <label for="published_at" class="form-label">Tanggal Publikasi</label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}" required>
                @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Ukuran maksimal gambar 2MB. Format yang didukung: JPG, PNG, GIF.</small>
            </div>
            
            <div class="mb-3">
                <div id="image-preview">
                    @if($blog->image)
                    <img src="{{ $blog->image }}" class="img-fluid blog-image-preview" alt="{{ $blog->title }}">
                    @endif
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid blog-image-preview" alt="Preview">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection