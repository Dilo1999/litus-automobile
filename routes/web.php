<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default hero image when file is missing (e.g. after DB reset / migrate)
$defaultHeroPath = 'images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp';

// Serve /storage/hero/* first: existing file or default image (never 404)
Route::get('/storage/hero/{path}', function (string $path) use ($defaultHeroPath) {
    $fullPath = storage_path('app/public/hero/' . $path);
    $storageRoot = realpath(storage_path('app/public'));
    if ($storageRoot && is_file($fullPath)) {
        $real = realpath($fullPath);
        if ($real && Str::startsWith($real, $storageRoot)) {
            return response()->file($real);
        }
    }
    $defaultFull = public_path($defaultHeroPath);
    if (is_file($defaultFull)) {
        return response()->file($defaultFull);
    }
    return redirect()->to(asset($defaultHeroPath));
})->where('path', '.*')->name('storage.hero');

// Serve other storage files when symlink doesn't work (e.g. shared hosting)
Route::get('/storage/{path}', function (string $path) {
    $fullPath = storage_path('app/public/' . $path);
    $realPath = realpath($fullPath);
    $storagePath = realpath(storage_path('app/public'));

    if ($realPath && $storagePath && Str::startsWith($realPath, $storagePath)) {
        return response()->file($realPath);
    }

    abort(404);
})->where('path', '.*')->name('storage.serve');

// Redirect unauthenticated users to Filament admin login (required by auth middleware)
Route::get('/login', function () {
    return redirect()->route('filament.auth.login');
})->name('login');

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/quote/products/search', [ProductController::class, 'searchForQuote'])->name('quote.products.search');
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
