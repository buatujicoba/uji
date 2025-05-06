@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.contacts') }}">Pesan Kontak</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pesan dari {{ $contact->name }}</h5>
            <div>
                @if(!$contact->read)
                <form action="{{ route('admin.contacts.mark-read', $contact->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-check"></i> Tandai Sudah Dibaca
                    </button>
                </form>
                @endif
                <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nama:</strong> {{ $contact->name }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                <p><strong>Layanan yang Diminati:</strong> {{ $contact->service }}</p>
                <p><strong>Tanggal:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
                <p>
                    <strong>Status:</strong> 
                    @if($contact->read)
                    <span class="badge bg-success">Dibaca</span>
                    @else
                    <span class="badge bg-warning">Belum Dibaca</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Pesan</h6>
                    </div>
                    <div class="card-body">
                        <p>{{ $contact->message }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('admin.contacts') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="mailto:{{ $contact->email }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> Balas Email
            </a>
        </div>
    </div>
</div>
@endsection