<?php

namespace Database\Seeders;

use App\Models\Webinar;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    public function run(): void
    {
        $webinars = [
            [
                'title'       => 'Pengenalan AI untuk Guru',
                'slug'        => 'pengenalan-ai-untuk-guru',
                'description' => 'Webinar gratis membahas bagaimana guru dapat memanfaatkan Artificial Intelligence dalam proses pembelajaran.',
                'topic'       => 'Artificial Intelligence (AI)',
                'type'        => 'free',
                'price'       => 0,
                'platform'    => 'Zoom',
                'status'      => 'completed',
            ],
            [
                'title'       => 'Membangun Website Sekolah dengan Laravel',
                'slug'        => 'membangun-website-sekolah-laravel',
                'description' => 'Workshop praktis membangun website sekolah profesional menggunakan Laravel dan PHP.',
                'topic'       => 'Laravel & PHP',
                'type'        => 'paid',
                'price'       => 150000,
                'platform'    => 'Zoom',
                'status'      => 'upcoming',
            ],
            [
                'title'       => 'Digitalisasi Administrasi Sekolah',
                'slug'        => 'digitalisasi-administrasi-sekolah',
                'description' => 'Webinar tentang strategi dan tools untuk digitalisasi administrasi sekolah secara efektif dan efisien.',
                'topic'       => 'Digitalisasi Sekolah',
                'type'        => 'free',
                'price'       => 0,
                'platform'    => 'Google Meet',
                'status'      => 'upcoming',
            ],
        ];

        foreach ($webinars as $webinar) {
            Webinar::firstOrCreate(['slug' => $webinar['slug']], $webinar);
        }
    }
}
