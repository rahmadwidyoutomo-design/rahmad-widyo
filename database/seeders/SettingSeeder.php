<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name'        => 'Rahmad Widyo',
            'tagline'          => 'Praktisi IT & Administrasi Pendidikan',
            'about_short'      => 'Membangun solusi digital untuk sekolah dan pendidikan melalui teknologi modern menggunakan AI.',
            'whatsapp'         => '',
            'email'            => 'rahmadwidyoutomo@gmail.com',
            'instagram'        => '',
            'linkedin'         => '',
            'meta_description' => 'Rahmad Widyo - Praktisi IT & Administrasi Pendidikan. Membangun solusi digital untuk sekolah melalui teknologi modern dan AI.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
