<?php

use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Models\BioLink;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/auth', [UserController::class, 'create'])->name('users.auth');
Route::get('/signup', [UserController::class, 'signup'])->name('users.signup');

Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::post('/auth', [UserController::class, 'auth'])->name('users.auths');

Route::get('/pricing', [UserController::class, 'princing'])->name('users.princing');
Route::get('/about', [UserController::class, 'about'])->name('users.about');

Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/cancel-payment', [PaymentController::class, 'cancel'])->name('checkout.cancel');
Route::post('/success-payment', [PaymentController::class, 'success'])->name('checkout.success');

Route::get('bio/{slug}', function ($slug) {
    $bio = BioLink::where('slug', $slug) 
    ->with(['usermodel', 'biolinkitems', 'theme']) 
    ->firstOrFail();

    if (!$bio->active) {
        abort(404); 
    }

    return view('bio.show', compact('bio'));
});


Route::middleware(['lofran'])->group(function () {
    Route::get('/home', [UserController::class, 'dashboard'])->name('users.dashboard');
    Route::get('/bio', [UserController::class, 'bio'])->name('users.bio');
    Route::get('/link', [UserController::class, 'link'])->name('users.link');
});




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/themes', [ThemeController::class, 'index'])->name('admin.themes.index');
    Route::get('/themes/create', [ThemeController::class, 'create'])->name('admin.themes.create');
    Route::delete('/themes/destroy', [ThemeController::class, 'destroy'])->name('admin.themes.destroy');
    Route::get('/themes/edit', [ThemeController::class, 'edit'])->name('admin.themes.edit');
    Route::post('/themes/store', [ThemeController::class, 'store'])->name('admin.themes.store');
});
