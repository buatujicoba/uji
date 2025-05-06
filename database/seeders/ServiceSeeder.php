<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Pengembangan Website',
                'description' => 'Kami menawarkan jasa pembuatan website profesional dengan desain yang menarik dan responsif. Website yang kami kembangkan dioptimalkan untuk performa dan pengalaman pengguna terbaik.',
                'features' => [
                    'Desain responsif untuk semua perangkat',
                    'Panel admin yang mudah digunakan',
                ]
            ],
            [
                'name' => 'Penetration Testing',
                'description' => 'Kami menyediakan layanan pengujian penetrasi untuk mengidentifikasi dan mengevaluasi celah keamanan dalam sistem Anda. Dengan metode pengujian terkini, kami membantu memastikan bahwa infrastruktur IT Anda aman dari potensi serangan siber.',
                'features' => [
                    'Pemindaian dan analisis kerentanan',
                    'Pengujian penetrasi pada website dan aplikasi',
                    'Laporan detail dan rekomendasi perbaikan',
                ]
            ],
            [
                'name' => 'Desain Grafis',
                'description' => 'Kami siap menciptakan desain visual yang menarik dan sesuai dengan identitas brand Anda. Layanan ini mencakup pembuatan logo, banner, brosur, dan yang lainnya.',
                'features' => [
                    'Desain logo dan identitas brand',
                    'Ilustrasi kustom',
                    'Revisi desain sesuai kebutuhan',
                ]
            ]
        ];

        foreach ($services as $serviceData) {
            Service::create([
                'name' => $serviceData['name'],
                'description' => $serviceData['description'],
                'features' => json_encode($serviceData['features']),
            ]);
        }
    }
}