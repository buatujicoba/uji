@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Blog</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $blogCount }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-newspaper fa-2x"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="{{ route('admin.blogs') }}" class="text-decoration-none">Lihat semua blog</a>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Layanan</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $serviceCount }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                            <i class="fas fa-cogs fa-2x"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="{{ route('admin.services') }}" class="text-decoration-none">Lihat semua layanan</a>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Pesan</h5>
                        <span class="h2 font-weight-bold mb-0">{{ App\Models\Contact::count() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="{{ route('admin.contacts') }}" class="text-decoration-none">Lihat semua pesan</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Blog Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Publikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Blog::orderBy('published_at', 'desc')->take(5)->get() as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->published_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Pesan Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Layanan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Contact::orderBy('created_at', 'desc')->take(5)->get() as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->service }}</td>
                                <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.view', $contact->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection