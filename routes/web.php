<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
//Route::get('/', function(){
//   return "<h1> Server connect successfully done!</h1>";
//};

//Page routes
Route::get('/', [HomeController::class, 'page']);
Route::get('/projects', [ProjectController::class, 'page']);
Route::get('/resume', [ResumeController::class, 'page']);
Route::get('/contact', [ContactController::class, 'page']);
Route::get('/services', function () {
    return view('pages.services');
});

Route::get('/work', function () {
    $projects = DB::table('projects')->take(8)->get();
    return view('pages.work', compact('projects'));
});

// Admin auth routes - zorg dat deze routes altijd toegankelijk zijn
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes - geen middleware meer, controle in controller
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/resume', [DashboardController::class, 'updateResume'])->name('resume.update');
    Route::post('/resume/password', [DashboardController::class, 'updatePassword'])->name('resume.password.update');
    Route::delete('/resume', [DashboardController::class, 'deleteResume'])->name('resume.delete');
    Route::get('/check-password', [DashboardController::class, 'checkPasswordStatus'])->name('resume.password.check');
});

//All GET request from DB
Route::get('/getAllContacts', [ContactController::class, 'getAllContacts']);
Route::get('/getAaboutDetails', [HomeController::class, 'getAaboutDetails']);
Route::get('/getEducationDetails', [ResumeController::class, 'getEducationDetails']);
Route::get('/getExperienceDetails', [ResumeController::class, 'getExperienceDetails']);
Route::get('/getHeroproperties', [HomeController::class, 'getHeroproperties']);
Route::get('/getLanguageDetails', [ResumeController::class, 'getLanguageDetails']);
Route::get('/getProfessionalSkill', [ResumeController::class, 'getProfessionalSkill']);
Route::get('/getAllProjectDetails', [ProjectController::class, 'getAllProjectDetails']);
Route::get('/getResumeLink', [ResumeController::class, 'getResumeLink']);
Route::get('/getSeoProperties', [HomeController::class, 'getSeoProperties']);
Route::get('/getSocialLinks', [HomeController::class, 'getSocialLinks']);
Route::get('/getResumeInfo', [ResumeController::class, 'getResumeInfo']);

//All Post Request from DB
Route::post('/postAaboutDetails', [HomeController::class, 'postAaboutDetails']);
Route::post('/postAContact', [ContactController::class, 'postAContact']);
Route::post('/postEducationDetails', [ResumeController::class, 'postEducationDetails']);
Route::post('/postExperienceDetails', [ResumeController::class, 'postExperienceDetails']);
Route::post('/postHeroproperties', [HomeController::class, 'postHeroproperties']);
Route::post('/postLanguageDetails', [ResumeController::class, 'postLanguageDetails']);
Route::post('/postProfessionalSkill', [ResumeController::class, 'postProfessionalSkill']);
Route::post('/postSingleProjectDetails', [ProjectController::class, 'postSingleProjectDetails']);
Route::post('/postResumeLink', [ResumeController::class, 'postResumeLink']);
Route::post('/postSeoProperties', [HomeController::class, 'postSeoProperties']);
Route::post('/postSocialLinks', [HomeController::class, 'postSocialLinks']);

// Resume file upload and download routes
Route::post('/uploadResumeFile', [ResumeController::class, 'uploadResumeFile']);
Route::post('/downloadResume', [ResumeController::class, 'downloadResume']);

