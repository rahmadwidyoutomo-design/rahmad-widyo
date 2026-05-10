<?php

namespace App\Http\Controllers;

use App\Models\Webinar;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::whereNotIn('status', ['draft'])
            ->orderBy('event_date', 'desc')
            ->paginate(9);

        return view('webinar.index', compact('webinars'));
    }

    public function show(string $slug)
    {
        $webinar = Webinar::where('slug', $slug)
            ->whereNotIn('status', ['draft'])
            ->firstOrFail();

        return view('webinar.show', compact('webinar'));
    }
}
