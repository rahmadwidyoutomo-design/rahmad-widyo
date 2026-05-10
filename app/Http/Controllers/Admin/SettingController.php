<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'       => 'nullable|string|max:100',
            'tagline'         => 'nullable|string|max:200',
            'about_short'     => 'nullable|string',
            'whatsapp'        => 'nullable|string|max:20',
            'email'           => 'nullable|email',
            'instagram'       => 'nullable|string|max:100',
            'linkedin'        => 'nullable|string|max:200',
            'facebook'        => 'nullable|string|max:200',
            'youtube'         => 'nullable|string|max:200',
            'meta_description'=> 'nullable|string|max:300',
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
