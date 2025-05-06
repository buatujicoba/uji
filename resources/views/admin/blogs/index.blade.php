@extends('admin.layouts.app')

@section('title', 'Kelola Blog')

@section('breadcrumb')
<li class="breadcrumb-item active">Blog</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Blog Baru
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal Publikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            @if($blog->image)
                            <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-thumbnail">
                            @else
                            <span class="badge bg-secondary">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->published_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-sm btn-info me-1" target="_blank" data-bs-toggle="tooltip" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data blog</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-3">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection