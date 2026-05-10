<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Webinar;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios'      => Portfolio::count(),
            'webinars'        => Webinar::count(),
            'contacts'        => Contact::count(),
            'unread_contacts' => Contact::where('status', 'unread')->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $upcomingWebinars = Webinar::where('status', 'upcoming')->orderBy('event_date')->take(3)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'upcomingWebinars'));
    }
}
