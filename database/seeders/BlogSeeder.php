<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $blogs = [
            [
                'title' => '10 Tips Meningkatkan Keamanan Website Anda',
                'slug' => '10-tips-meningkatkan-keamanan-website',
                'excerpt' => 'Pelajari cara-cara efektif untuk melindungi website Anda dari serangan siber yang semakin canggih. Terapkan langkah-langkah preventif ini untuk meminimalisir risiko keamanan...',
                'content' => '# 10 Tips Meningkatkan Keamanan Website Anda

Di era digital yang terus berkembang, keamanan website menjadi hal yang tidak bisa diabaikan. Serangan siber semakin canggih dan menargetkan semua jenis website, mulai dari blog pribadi hingga platform e-commerce besar. Berikut adalah 10 tips efektif untuk meningkatkan keamanan website Anda.

## 1. Gunakan HTTPS

Protokol HTTPS (Hypertext Transfer Protocol Secure) mengenkripsi data yang ditransmisikan antara browser dan server. Ini melindungi informasi sensitif seperti password, informasi kartu kredit, dan data pribadi lainnya dari interception attacks.

## 2. Perbarui Semua Software

Selalu perbarui CMS, plugin, themes, dan komponen lainnya ke versi terbaru. Update biasanya mengandung patch keamanan untuk menutup celah yang ditemukan sebelumnya.

## 3. Gunakan Password yang Kuat

Buat password yang kompleks dengan kombinasi huruf besar-kecil, angka, dan karakter khusus. Gunakan password manager untuk mengelola berbagai password secara aman.

## 4. Implementasikan Firewall

Web Application Firewall (WAF) membantu mengidentifikasi dan memblokir traffic berbahaya sebelum mencapai server Anda. Ini termasuk SQL injection, cross-site scripting (XSS), dan serangan lainnya.

## 5. Backup Regular

Lakukan backup data website secara rutin, idealnya setiap hari. Simpan backup di lokasi terpisah dan aman, baik offline maupun di cloud.

## 6. Validasi Input User

Selalu validasi dan sanitasi setiap input dari user untuk mencegah SQL injection dan XSS attacks. Jangan pernah percayai data yang datang dari sisi client.

## 7. Gunakan CSP (Content Security Policy)

CSP membantu mencegah cross-site scripting attacks dengan membatasi sumber konten yang bisa diload oleh website Anda.

## 8. Monitoring Keamanan

Gunakan tool monitoring untuk mendeteksi aktivitas mencurigakan pada website Anda. Banyak layanan yang menawarkan alert real-time untuk ancaman keamanan.

## 9. Batasi Login Attempts

Implementasikan pembatasan jumlah percobaan login yang gagal untuk mencegah brute force attacks. Gunakan CAPTCHA setelah beberapa percobaan gagal.

## 10. Edukasi Tim

Pastikan semua orang yang memiliki akses ke website memahami praktik keamanan dasar. Manusia seringkali menjadi celah keamanan terlemah.

## Kesimpulan

Keamanan website adalah proses berkelanjutan, bukan one-time task. Dengan menerapkan tips di atas secara konsisten, Anda dapat mengurangi risiko serangan siber dan melindungi data penting Anda.',
                'image' => 'https://apps.codepolitan.com/sites/learn/uploads/original/202308/10+_Cara_Meningkatkan_Keamanan_Website___Proteksi_Lengkap!.png',
                'published_at' => '2025-03-28',
            ],
            [
                'title' => 'Tren Desain Website yang Akan Populer di 2025',
                'slug' => 'tren-desain-website-2025',
                'excerpt' => 'Dunia desain website terus berkembang dengan inovasi dan tren baru. Tahun 2025 diprediksi akan didominasi oleh beberapa tren desain yang memadukan estetika dan fungsionalitas...',
                'content' => '# Tren Desain Website yang Akan Populer di 2025

Dunia desain website terus berevolusi dengan cepat. Tahun 2025 diprediksi akan membawa perubahan signifikan dalam cara kita mendesain dan mengalami website. Berikut adalah tren utama yang akan mendominasi desain website di 2025.

## 1. AI-Generated Design Elements

Kecerdasan buatan akan semakin terintegrasi dalam proses desain website. AI tidak hanya membantu mengoptimalkan user experience, tetapi juga menghasilkan konten visual, layout yang personal, dan adaptive design berdasarkan perilaku user.

## 2. Sustainable Web Design

Dengan meningkatnya kesadaran lingkungan, desain website yang ramah lingkungan menjadi prioritas. Ini termasuk optimasi performa untuk mengurangi konsumsi energi, menggunakan hosting ramah lingkungan, dan minimalis design approach.

## 3. Immersive 3D Experiences

WebXR dan WebGL akan membuat pengalaman 3D menjadi lebih umum di website. Dari product showcase interaktif hingga virtual showroom, pengalaman immersive akan menjadi standar baru.

## 4. Hyper-Personalization

Website yang beradaptasi dengan preferensi individual user secara real-time akan menjadi norma. Konten, layout, dan bahkan elemen visual akan disesuaikan berdasarkan data perilaku, lokasi, dan preferensi user.

## 5. Voice User Interface (VUI) Integration

Dengan semakin populernya voice search dan voice commands, desainer akan mengintegrasikan voice interaction patterns ke dalam web design. Ini termasuk voice-activated navigation dan voice-friendly content structure.

## 6. Micro-animations yang Meaningful

Animasi halus dan purposeful akan terus berkembang. Namun, fokusnya akan bergeser ke micro-animations yang tidak hanya indah secara visual tetapi juga membantu user memahami interface dengan lebih baik.

## 7. Adaptive Typography

Tipografi yang beradaptasi dengan device, lighting conditions, dan bahkan preferensi keterbacaan user akan menjadi standar. Variable fonts akan memungkinkan fleksibilitas yang belum pernah ada sebelumnya.

## 8. Neobrutalism dan Raw Aesthetics

Sebagai reaksi terhadap perfectionism digital, desain yang "raw" dan imperfect secara sengaja akan mendapatkan popularitas. Ini mencakup hand-drawn elements, visible grids, dan unconventional layouts.

## 9. Minimal Maximalism

Kombinasi antara minimalist principles dengan elemen maksimalis akan menciptakan tren baru. Desainer akan menggunakan bold colors, large typography, dan white space secara bersamaan.

## 10. Ethical Design Practices

Desain yang mengutamakan privasi user, aksesibilitas, dan wellbeing digital akan menjadi fokus utama. Ini termasuk transparent data collection, inclusive design, dan digital wellness features.

## Kesimpulan

Tren desain website 2025 menunjukkan pergerakan menuju pengalaman yang lebih personal, sustainable, dan immersive. Dengan teknologi yang terus berkembang, desainer memiliki tools yang lebih powerful untuk menciptakan website yang tidak hanya beautiful tetapi juga meaningful dan environmentally conscious.',
                'image' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'published_at' => '2025-03-20',
            ],
            [
                'title' => 'Strategi Digital Marketing untuk UMKM di Era 2025',
                'slug' => 'strategi-digital-marketing-umkm-2025',
                'excerpt' => 'UMKM perlu beradaptasi dengan perubahan lanskap digital untuk tetap kompetitif. Pelajari strategi digital marketing yang efektif dan terjangkau untuk mengembangkan bisnis Anda...',
                'content' => '# Strategi Digital Marketing untuk UMKM di Era 2025

Lanskap digital marketing terus berubah dengan cepat, dan UMKM harus beradaptasi untuk tetap kompetitif. Tahun 2025 membawa peluang dan tantangan baru bagi bisnis kecil dan menengah. Berikut adalah strategi digital marketing yang efektif dan terjangkau untuk UMKM.

## 1. Social Commerce Optimization

Platform media sosial semakin terintegrasi dengan fitur e-commerce. UMKM harus mengoptimalkan:
- Instagram Shopping dan Facebook Shops
- Live commerce untuk engagement langsung
- User-generated content untuk social proof
- Influencer marketing mikro dan nano

## 2. Local SEO Strategy

Optimasi untuk pencarian lokal menjadi sangat penting:
- Google Business Profile yang terupdate
- Local keyword optimization
- Customer reviews management
- Local citations dan backlinks

## 3. Content Marketing yang Relevan

Fokus pada konten yang bernilai:
- Video marketing pendek (TikTok, Reels)
- Interactive content (quizzes, polls)
- Behind-the-scenes content
- Case studies dan testimoni

## 4. AI-Powered Marketing Automation

Manfaatkan AI untuk efisiensi:
- Chatbots untuk customer service 24/7
- Personalized email marketing
- Predictive analytics untuk customer behavior
- Automated content creation tools

## 5. Community Building

Bangun komunitas loyal di sekitar brand:
- Facebook Groups atau LinkedIn Communities
- Regular engagement dengan followers
- Exclusive content untuk members
- Community events (online/offline)

## 6. Multi-Channel Approach

Diversifikasi channel marketing:
- Email marketing yang responsive
- SMS marketing untuk urgent communications
- Push notifications untuk mobile apps
- Retargeting ads yang efektif

## 7. Sustainable Digital Practices

Adopsi praktik marketing berkelanjutan:
- Eco-friendly packaging untuk e-commerce
- Digital receipts menggantikan kertas
- Energy-efficient web hosting
- Support untuk local causes

## 8. Data-Driven Decision Making

Gunakan data untuk strategi:
- Track key metrics (CTR, conversion rate, ROI)
- A/B testing untuk konten dan ads
- Customer journey mapping
- Competitor analysis tools

## 9. Mobile-First Strategy

Prioritaskan pengalaman mobile:
- Responsive web design
- Mobile-optimized checkout process
- Progressive Web Apps (PWA)
- AMP (Accelerated Mobile Pages)

## 10. Budget Optimization

Maksimalkan ROI dengan budget terbatas:
- Focus pada high-converting channels
- Use free marketing tools
- Leverage organic reach
- Partnership dengan bisnis komplementer

## Tips Implementasi

### Quick Wins untuk Memulai:
1. Optimalkan Google Business Profile
2. Setup basic email marketing automation
3. Mulai konsisten posting di 1-2 platform utama
4. Collect dan showcase customer testimonials

### Tools Terjangkau:
- Canva untuk desain visual
- Buffer/Hootsuite untuk social media management
- Mailchimp untuk email marketing
- Google Analytics untuk tracking

## Kesimpulan

Digital marketing untuk UMKM di 2025 bukan tentang mengikuti setiap tren, tetapi memilih strategi yang sesuai dengan target audience dan budget. Fokus pada building relationship, providing value, dan mengukur hasil akan memastikan kesuksesan jangka panjang dalam digital marketing.',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'published_at' => '2025-03-15',
            ]
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}