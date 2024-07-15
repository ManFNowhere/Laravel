<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectAuthenticated;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'home']);

Route::get('/weather', [WeatherController::class,'index']);
// Route::get('/weather/{slug}', [WeatherController::class, 'show']);
Route::get('/weather/save', function(){
    return redirect("/weather");
});
Route::post('/weather/show', [WeatherController::class, 'show']);
Route::get('/weather/show', function(){
    return redirect("/weather");
});
Route::post('/weather/save', [WeatherController::class,'saveToDatabase'])->middleware(Authenticate::class);
Route::get('/show-table/{table_name}', [WeatherController::class, 'showTable'])->middleware(Authenticate::class);
Route::get('/delete-table/{table_name}', [WeatherController::class, 'deleteTable'])->middleware(Authenticate::class);

Route::get('/register', [RegisterController::class, 'index'])->middleware(RedirectAuthenticated::class);
Route::post('/validate', [RegisterController::class, 'validate']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware(RedirectAuthenticated::class);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/profile', [ProfileController::class,'index'])->middleware(Authenticate::class);
Route::post('/profile', [ProfileController::class, 'update']);


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'post']);

Route::get('/create-post', [PostController::class, 'create'])->middleware(Authenticate::class);
Route::post('/create-post', [PostController::class, 'upload'])->middleware(Authenticate::class);

Route::post('/post-delete/{slug}', [PostController::class,'delete'])->middleware(Authenticate::class);
Route::get('/post-edit/{slug}', [PostController::class,'update'])->middleware(Authenticate::class);
Route::get('/dashboard', [DashboardController::class,'index'])->middleware(Authenticate::class);



// testing