<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - SidoTech</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog-detail.css') }}">
</head>
<body>
    <!-- Header dengan navigasi -->
    <header>
        <h1>SidoTech</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}#beranda">Beranda</a></li>
                <li><a href="{{ route('home') }}#layanan">Layanan</a></li>
                <li><a href="{{ route('home') }}#tentang">Tentang Kami</a></li>
                <li><a href="{{ route('home') }}#testimoni">Testimoni</a></li>
                <li><a href="{{ route('home') }}#blog">Blog</a></li>
                <li><a href="{{ route('home') }}#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <!-- Blog Detail Section -->
    <section class="blog-detail">
        <div class="blog-detail-container">
            <div class="blog-back">
                <a href="{{ route('home') }}#blog" class="back-link">&larr; Kembali ke Blog</a>
            </div>
            
            <article class="blog-detail-content">
                <header class="blog-header">
                    <h1>{{ $blog->title }}</h1>
                    <div class="blog-meta">
                        <span class="blog-date">{{ $blog->published_at->format('d M Y') }}</span>
                    </div>
                </header>
                
                @if($blog->image)
                <div class="blog-featured-image">
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                </div>
                @endif
                
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
                
                <footer class="blog-footer">
                    <div class="blog-tag">
                        <span>Kategori: Teknologi</span>
                    </div>
                    <div class="blog-share">
                        <span>Bagikan:</span>
                        <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.detail', $blog->slug)) }}" class="share-btn facebook" target="_blank">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.detail', $blog->slug)) }}&text={{ urlencode($blog->title) }}" class="share-btn twitter" target="_blank">Twitter</a>
                        <a href="https://linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.detail', $blog->slug)) }}" class="share-btn linkedin" target="_blank">LinkedIn</a>
                    </div>
                </footer>
            </article>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="cta-container">
            <h2>Butuh Layanan Teknologi untuk Bisnis Anda?</h2>
            <p>Hubungi kami untuk konsultasi gratis dan penawaran terbaik</p>
            <a href="{{ route('home') }}#kontak" class="cta-button">Hubungi Kami Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>SidoTech</h3>
                <p>Ikuti kami di sosial media</p>
                <div class="social-icons">
                    <a href="https://facebook.com" aria-label="Facebook"><i class="social-icon facebook"></i></a>
                    <a href="https://instagram.com" aria-label="Instagram"><i class="social-icon instagram"></i></a>
                    <a href="https://linkedin.com" aria-label="LinkedIn"><i class="social-icon linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="{{ route('home') }}#beranda">Beranda</a></li>
                    <li><a href="{{ route('home') }}#layanan">Layanan</a></li>
                    <li><a href="{{ route('home') }}#tentang">Tentang Kami</a></li>
                    <li><a href="{{ route('home') }}#blog">Blog</a></li>
                    <li><a href="{{ route('home') }}#kontak">Kontak</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Kontak Kami</h3>
                <address>
                    Sidoarjo<br>
                    Telepon: 089683839137<br>
                    Email: alvarorinaldihiero@gmail.com
                </address>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SidoTech. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>