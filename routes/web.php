<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('language/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'it'])) {
        abort(400);
    }

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->name("admin.")->prefix("admin")->group(function() {
        Route::get("/", [DashboardController::class, 'index'])->name("index");
        Route::get("/profile", [DashboardController::class, 'profile'])->name("profile");
        Route::resource("projects", ProjectController::class);
        Route::resource("types", TypeController::class);
        Route::resource("technologies", TechnologyController::class);
    });

Route::get('/palette-preview', fn () => view('admin.palette-preview'))->middleware('auth');

Route::get('/test-dd', function () {
    echo '<h3>PHP_SAPI: ' . PHP_SAPI . '</h3>';
    echo '<h3>html_errors: ' . ini_get('html_errors') . '</h3>';
    echo '<h3>Accept: ' . ($_SERVER['HTTP_ACCEPT'] ?? 'N/A') . '</h3>';
    echo '<hr>';
    dd(['hello' => 'world', 'test' => [1, 2, 3], 'nested' => ['a' => 1, 'b' => 2]]);
})->middleware('auth');

require __DIR__.'/auth.php';
