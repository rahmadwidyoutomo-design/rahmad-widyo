<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\WebinarController as AdminWebinarController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ───────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');

Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portofolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar.index');
Route::get('/webinar/{slug}', [WebinarController::class, 'show'])->name('webinar.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

// ─── Auth Routes ─────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (\Illuminate\Http\Request $request) {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    });
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

// ─── Admin Routes ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('portfolio', AdminPortfolioController::class)->except(['show']);
    Route::resource('webinar', AdminWebinarController::class)->except(['show']);

    Route::get('contact', [AdminContactController::class, 'index'])->name('contact.index');
    Route::get('contact/{contact}', [AdminContactController::class, 'show'])->name('contact.show');
    Route::delete('contact/{contact}', [AdminContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::post('about', [AboutController::class, 'update'])->name('about.update');
    Route::get('about/delete-photo', [AboutController::class, 'deletePhoto'])->name('about.delete-photo');
    Route::post('about/organization', [AboutController::class, 'storeOrganization'])->name('about.organization.store');
    Route::put('about/organization/{organization}', [AboutController::class, 'updateOrganization'])->name('about.organization.update');
    Route::delete('about/organization/{organization}', [AboutController::class, 'destroyOrganization'])->name('about.organization.destroy');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});
