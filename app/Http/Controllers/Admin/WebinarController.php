<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::latest()->paginate(10);
        return view('admin.webinar.index', compact('webinars'));
    }

    public function create()
    {
        return view('admin.webinar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:200',
            'description'      => 'nullable|string',
            'image'            => 'nullable|image|max:2048',
            'topic'            => 'required|string|max:100',
            'type'             => 'required|in:free,paid',
            'price'            => 'nullable|numeric|min:0',
            'registration_url' => 'nullable|url',
            'event_date'       => 'nullable|date',
            'platform'         => 'nullable|string|max:100',
            'status'           => 'required|in:upcoming,ongoing,completed,draft',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('webinars', 'public');
        }

        Webinar::create($validated);

        return redirect()->route('admin.webinar.index')->with('success', 'Webinar berhasil ditambahkan.');
    }

    public function edit(Webinar $webinar)
    {
        return view('admin.webinar.edit', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:200',
            'description'      => 'nullable|string',
            'image'            => 'nullable|image|max:2048',
            'topic'            => 'required|string|max:100',
            'type'             => 'required|in:free,paid',
            'price'            => 'nullable|numeric|min:0',
            'registration_url' => 'nullable|url',
            'event_date'       => 'nullable|date',
            'platform'         => 'nullable|string|max:100',
            'status'           => 'required|in:upcoming,ongoing,completed,draft',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('webinars', 'public');
        }

        $webinar->update($validated);

        return redirect()->route('admin.webinar.index')->with('success', 'Webinar berhasil diperbarui.');
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->delete();
        return redirect()->route('admin.webinar.index')->with('success', 'Webinar berhasil dihapus.');
    }
}
