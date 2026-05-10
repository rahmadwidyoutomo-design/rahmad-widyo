<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title'       => 'E-Perpus',
                'slug'        => 'e-perpus',
                'description' => 'Sistem perpustakaan digital untuk sekolah. Memudahkan pengelolaan koleksi buku, peminjaman, dan pengembalian secara digital.',
                'tech_stack'  => 'PHP, Laravel, MySQL, Bootstrap',
                'status'      => 'published',
                'order'       => 1,
            ],
            [
                'title'       => 'E-Surat',
                'slug'        => 'e-surat',
                'description' => 'Sistem manajemen surat menyurat digital untuk instansi pendidikan. Mempermudah pengelolaan surat masuk dan keluar.',
                'tech_stack'  => 'PHP, Laravel, MySQL, Bootstrap',
                'status'      => 'published',
                'order'       => 2,
            ],
            [
                'title'       => 'SI-PENA',
                'slug'        => 'si-pena',
                'description' => 'Sistem Informasi Pendidikan dan Administrasi. Platform terintegrasi untuk manajemen data siswa, guru, dan administrasi sekolah.',
                'tech_stack'  => 'PHP, Laravel, MySQL, Bootstrap, Chart.js',
                'status'      => 'published',
                'order'       => 3,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::firstOrCreate(['slug' => $portfolio['slug']], $portfolio);
        }
    }
}
