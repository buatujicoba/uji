@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.services') }}">Layanan</a></li>
<li class="breadcrumb-item active">Tambah Baru</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Layanan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fitur</label>
                
                <div id="features-container">
                    @if(old('features'))
                        @foreach(old('features') as $index => $feature)
                        <div class="feature-input-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control @error('features.'.$index) is-invalid @enderror" name="features[]" value="{{ $feature }}" required>
                                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @error('features.'.$index)
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach
                    @else
                        <div class="feature-input-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="features[]" required>
                                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                
                <button type="button" class="btn btn-sm btn-success btn-add-feature" onclick="addFeature()">
                    <i class="fas fa-plus"></i> Tambah Fitur
                </button>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.services') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function addFeature() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.classList.add('feature-input-group');
        newFeature.innerHTML = `
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="features[]" required>
                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newFeature);
    }
    
    function removeFeature(button) {
        // Get the features container
        const featuresContainer = document.getElementById('features-container');
        
        // Only remove if there's more than one feature
        if (featuresContainer.children.length > 1) {
            // Get the parent feature-input-group div and remove it
            const featureInputGroup = button.closest('.feature-input-group');
            featuresContainer.removeChild(featureInputGroup);
        } else {
            alert('Minimal satu fitur harus ada.');
        }
    }
</script>
@endsection