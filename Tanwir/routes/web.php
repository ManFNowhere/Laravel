<?php

use App\Http\Controllers\AccessibilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TutorialController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('projects', [ProjectController::class, 'index']);

Route::middleware(LoginMiddleware::class)->group(function(){
    Route::get('login', [LoginController::class,'index']);
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware(UserMiddleware::class)->group(function(){
    Route::post('logout', [LoginController::class, 'logout']);
    // Route::get('dashboard', [DashboardController::class,'index']);
    Route::get('add-project', [DashboardController::class,'addProject']);
    Route::post('store-project', [DashboardController::class,'storeProject']);
    Route::get('edit-project/{slug}', [DashboardController::class,'editProject']);
    Route::post('update-project', [DashboardController::class,'updateProject']);
    Route::get('delete-project/{slug}', [DashboardController::class,'deleteProject']);
});

Route::get('dashboard', [DashboardController::class,'index']);
// route Accessibility
Route::resource('tutorial', TutorialController::class);
Route::get('color-contrast', [TutorialController::class, 'colorContrast'])->name('color.contrast');
Route::get('test', [TutorialController::class, 'test'])->name('test');