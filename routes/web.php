<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [HomeController::class, 'page'])->name('home');
Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');
Route::get('/projects', [ProjectController::class, 'page'])->name('projects');
Route::get('/resume', [ResumeController::class, 'page'])->name('resume');
Route::post('/resume/verify', [ResumeController::class, 'verifyPassword'])->name('resume.verify');
Route::get('/resume/download', [ResumeController::class, 'download'])->name('resume.download');
Route::get('/resume/preview', [ResumeController::class, 'preview'])->name('resume.preview');
Route::get('/contact', [ContactController::class, 'page'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::view('/services', 'pages.services')->name('services');

Route::post('/lang-switch', function () {
    $lang = request('lang');

    if (in_array($lang, ['en', 'nl'], true)) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }

    return back();
})->name('lang.switch');
