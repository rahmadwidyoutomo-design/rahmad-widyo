<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('status', 'published')
            ->orderBy('order')
            ->get();

        return view('portfolio.index', compact('portfolios'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('portfolio.show', compact('portfolio'));
    }
}
