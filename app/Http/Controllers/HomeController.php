<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Webinar;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('status', 'published')
            ->orderBy('order')
            ->take(6)
            ->get();

        $webinars = Webinar::whereIn('status', ['upcoming', 'ongoing'])
            ->orderBy('event_date')
            ->take(3)
            ->get();

        return view('home', compact('portfolios', 'webinars'));
    }

    public function about()
    {
        return view('about');
    }
}
