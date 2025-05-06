<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SidoTech</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- 1. Header dengan navigasi -->
    <header>
        <h1>SidoTech</h1>
        <nav>
            <button class="nav-toggle" aria-label="Toggle Navigation Menu">☰</button>
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <!-- 2. Hero section dengan deskripsi utama -->
    <section id="beranda">
        <h2>Selamat Datang di Website SidoTech</h2>
        <p>Kami hadir untuk membantu Anda dengan layanan pengembangan website, keamanan siber, dan desain grafis.</p>
        <a href="#kontak">Hubungi Kami</a>
    </section>

    <!-- Section tentang kami -->
    <section id="tentang">
        <h2>Tentang Kami</h2>
        <div class="tentang-container">
            <div class="tentang-image">
                <img src="https://i.pinimg.com/736x/18/f7/a8/18f7a83f40c9fad584c0faf06c22ac1c.jpg" alt="Tim SidoTech">
            </div>
            <div class="tentang-content">
                <h3>Siapa Kami?</h3>
                <p>SidoTech adalah perusahaan teknologi yang berbasis di Sidoarjo, didirikan pada tahun 2022 oleh sekelompok ahli IT dengan visi untuk menyediakan solusi teknologi yang terjangkau dan berkualitas tinggi bagi bisnis lokal.</p>
                
                <h3>Visi Kami</h3>
                <p>Menjadi mitra teknologi tepercaya yang membantu bisnis dan organisasi di Indonesia untuk bertransformasi digital dan berkembang di era digital.</p>
                
                <h3>Misi Kami</h3>
                <ul>
                    <li>Menyediakan layanan teknologi berkualitas tinggi dengan harga yang terjangkau</li>
                    <li>Membantu bisnis lokal mengadopsi teknologi terbaru untuk meningkatkan operasional</li>
                    <li>Mendukung pertumbuhan ekonomi digital di Sidoarjo dan sekitarnya</li>
                    <li>Terus berinovasi dan mengikuti perkembangan teknologi terkini</li>
                </ul>
                
                <h3>Tim Kami</h3>
                <p>Tim kami terdiri dari para profesional berpengalaman di bidang pengembangan web, keamanan siber, dan desain grafis. Dengan latar belakang yang beragam, kami memiliki keahlian yang komprehensif untuk menangani berbagai kebutuhan teknologi Anda.</p>
            </div>
        </div>
    </section>

    <!-- 3. Section layanan sebagai konten utama dengan pricing -->
    <section id="layanan">
        <h2>Layanan Kami</h2>
        <p>Kami menyediakan berbagai layanan profesional untuk memenuhi kebutuhan Anda</p>
        
        @if(isset($services) && $services->count() > 0)
            @foreach($services as $service)
            <article>
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                @if($service->features)
                <ul>
                    @php
                        $features = is_array($service->features) ? $service->features : json_decode($service->features, true);
                    @endphp
                    @if($features)
                        @foreach($features as $feature)
                        <li>{{ $feature }}</li>
                        @endforeach
                    @endif
                </ul>
                @endif
                
                <!-- Pricing section based on service name -->
                @if($service->name == 'Pengembangan Website')
                <div class="pricing-container">
                    <div class="pricing-card">
                        <h4>Paket Dasar</h4>
                        <div class="price">Rp 1.500.000</div>
                        <ul>
                            <li>Website 5 Halaman</li>
                            <li>Desain Responsif</li>
                            <li>Form Kontak</li>
                            <li>Gratis Revisi 2x</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card highlight">
                        <div class="pricing-tag">Populer</div>
                        <h4>Paket Standar</h4>
                        <div class="price">Rp 3.500.000</div>
                        <ul>
                            <li>Website 10 Halaman</li>
                            <li>Desain Premium</li>
                            <li>Form Kontak & Booking</li>
                            <li>Integrasi Media Sosial</li>
                            <li>SEO Dasar</li>
                            <li>Gratis Revisi 5x</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card">
                        <h4>Paket Professional</h4>
                        <div class="price">Rp 7.000.000</div>
                        <ul>
                            <li>Website Unlimited Page</li>
                            <li>Custom Design</li>
                            <li>Sistem Manajemen Konten</li>
                            <li>Integrasi Sistem Pembayaran</li>
                            <li>SEO Full Package</li>
                            <li>Gratis Revisi 10x</li>
                            <li>Maintenance 1 Tahun</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                </div>
                @elseif($service->name == 'Penetration Testing')
                <div class="pricing-container">
                    <div class="pricing-card">
                        <h4>Paket Dasar</h4>
                        <div class="price">Rp 2.500.000</div>
                        <ul>
                            <li>Vulnerability Assessment</li>
                            <li>Pemindaian Kerentanan Sistem</li>
                            <li>Laporan Dasar</li>
                            <li>Rekomendasi Dasar</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card highlight">
                        <div class="pricing-tag">Populer</div>
                        <h4>Paket Standar</h4>
                        <div class="price">Rp 5.000.000</div>
                        <ul>
                            <li>Full Penetration Testing</li>
                            <li>Analisis Kerentanan Menyeluruh</li>
                            <li>Simulasi Serangan</li>
                            <li>Laporan Terperinci</li>
                            <li>Rekomendasi Perbaikan</li>
                            <li>Konsultasi 2 Jam</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card">
                        <h4>Paket Professional</h4>
                        <div class="price">Rp 10.000.000</div>
                        <ul>
                            <li>Full Penetration Testing</li>
                            <li>Social Engineering Testing</li>
                            <li>Network & Infrastructure Testing</li>
                            <li>Physical Security Assessment</li>
                            <li>Laporan Lengkap</li>
                            <li>Panduan Penanggulangan</li>
                            <li>Konsultasi 5 Jam</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                </div>
                @elseif($service->name == 'Desain Grafis')
                <div class="pricing-container">
                    <div class="pricing-card">
                        <h4>Paket Dasar</h4>
                        <div class="price">Rp 800.000</div>
                        <ul>
                            <li>Logo Dasar</li>
                            <li>2 Konsep Desain</li>
                            <li>Format File Standard</li>
                            <li>Revisi 2x</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card highlight">
                        <div class="pricing-tag">Populer</div>
                        <h4>Paket Standar</h4>
                        <div class="price">Rp 2.000.000</div>
                        <ul>
                            <li>Logo Premium</li>
                            <li>5 Konsep Desain</li>
                            <li>Kartu Nama & Kop Surat</li>
                            <li>Format File Lengkap</li>
                            <li>Brand Guidelines</li>
                            <li>Revisi 5x</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                    
                    <div class="pricing-card">
                        <h4>Paket Professional</h4>
                        <div class="price">Rp 5.000.000</div>
                        <ul>
                            <li>Brand Identity Full Package</li>
                            <li>8 Konsep Desain</li>
                            <li>Stationary Kit Lengkap</li>
                            <li>Social Media Kit</li>
                            <li>Marketing Materials</li>
                            <li>Brand Guidelines Komprehensif</li>
                            <li>Revisi Unlimited</li>
                        </ul>
                        <a href="#kontak" class="pricing-button">Pilih Paket</a>
                    </div>
                </div>
                @endif
            </article>
            @endforeach
        @else
            <p>Data layanan belum tersedia.</p>
        @endif
    </section>

    <!-- 4. Section informasi atau testimoni -->
    <section id="testimoni">
        <h2>Testimoni Pelanggan</h2>
        
        <blockquote>
            <p>"Layanan yang sangat memuaskan dan profesional. Sangat direkomendasikan!"</p>
            <cite>Robby</cite>
        </blockquote>
        
        <blockquote>
            <p>"Hasil pekerjaan sangat sesuai dengan ekspektasi. Terima kasih atas kerjasamanya!"</p>
            <cite>Vanessa</cite>
        </blockquote>
    </section>

    <!-- 5. Section blog -->
    <section id="blog">
        <h2>Blog SidoTech</h2>
        <p>Temukan artikel terbaru dan wawasan seputar teknologi dari tim kami</p>
        
        <div class="blog-container">
            @if(isset($blogs) && $blogs->count() > 0)
                @foreach($blogs as $blog)
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                    </div>
                    <div class="blog-content">
                        <div class="blog-date">{{ $blog->published_at->format('d M Y') }}</div>
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="blog-link">Baca Selengkapnya</a>
                    </div>
                </article>
                @endforeach
            @else
                <p>Artikel blog belum tersedia.</p>
            @endif
        </div>
        
        <div class="blog-more">
            <a href="#" class="blog-more-button">Lihat Semua Artikel</a>
        </div>
    </section>

    <!-- 6. Formulir kontak sederhana -->
    <section id="kontak">
        <h2>Hubungi Kami</h2>
        <form action="{{ route('contact.submit') }}" method="post" id="contactForm">
            @csrf
            <div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <span id="nama-error" class="error-message"></span>
            </div>
            
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span id="email-error" class="error-message"></span>
            </div>
            
            <div>
                <label for="layanan">Layanan yang Diminati:</label>
                <select id="layanan" name="layanan">
                    <option value="">Pilih Layanan</option>
                    <option value="web">Pengembangan Website</option>
                    <option value="pentest">Penetration Testing</option>
                    <option value="design">Desain Grafis</option>
                </select>
                <span id="layanan-error" class="error-message"></span>
            </div>
            
            <div>
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" rows="5" required></textarea>
                <span id="pesan-error" class="error-message"></span>
            </div>
            
            <div>
                <button type="submit">Kirim Pesan</button>
            </div>
        </form>
    </section>

    <!-- 7. Footer  -->
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
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#kontak">Kontak</a></li>
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