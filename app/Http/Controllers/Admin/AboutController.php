<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $organizations = Organization::orderBy('order')->get();

        return view('admin.about.index', compact('settings', 'organizations'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_title'       => 'nullable|string|max:100',
            'about_description' => 'nullable|string',
            'profile_photo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Save text settings
        if ($request->has('about_title')) {
            Setting::set('about_title', $request->about_title);
        }
        if ($request->has('about_description')) {
            Setting::set('about_description', $request->about_description);
        }

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo
            $oldPhoto = Setting::get('profile_photo');
            if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }

            $path = $request->file('profile_photo')->store('about', 'public');
            Setting::set('profile_photo', $path);
        }

        return back()->with('success', 'Halaman Tentang Saya berhasil diperbarui.');
    }

    public function deletePhoto()
    {
        $photo = Setting::get('profile_photo');
        if ($photo && Storage::disk('public')->exists($photo)) {
            Storage::disk('public')->delete($photo);
        }
        Setting::set('profile_photo', null);

        return back()->with('success', 'Foto profil berhasil dihapus.');
    }

    // ─── Organization CRUD ────────────────────────────────────────────────────

    public function storeOrganization(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'role'  => 'nullable|string|max:100',
            'logo'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['name', 'role', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('organizations', 'public');
        }

        Organization::create($data);

        return back()->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function updateOrganization(Request $request, Organization $organization)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'role'  => 'nullable|string|max:100',
            'logo'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['name', 'role', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($organization->logo && Storage::disk('public')->exists($organization->logo)) {
                Storage::disk('public')->delete($organization->logo);
            }
            $data['logo'] = $request->file('logo')->store('organizations', 'public');
        }

        $organization->update($data);

        return back()->with('success', 'Organisasi berhasil diperbarui.');
    }

    public function destroyOrganization(Organization $organization)
    {
        if ($organization->logo && Storage::disk('public')->exists($organization->logo)) {
            Storage::disk('public')->delete($organization->logo);
        }

        $organization->delete();

        return back()->with('success', 'Organisasi berhasil dihapus.');
    }
}
