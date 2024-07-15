<?php

use App\Http\Controllers\AddMovieController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;




// public middleware
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/search/',[MovieController::class,'search'])->name('search');




// breezer middleware
Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/change-password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('/delete-user', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscription', [SubscriptionController::class, 'subscription'])->name('post.subscription');
    Route::get('/subscription/cancel/{id}', [SubscriptionController::class, 'cancel'])->name('cancel.subscription');
    Route::get('/subscription/cancel-subscription/{id}', [SubscriptionController::class, 'cancelSubscription'])->name('post.cancel.subscription');
    Route::get('/subscription/succes/{type}', [SubscriptionController::class, 'success'])->name('success.subscription');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';


// subscriber middleware
Route::get('watch/{slug}', [MovieController::class,'watch'])->name('watch')->middleware(['auth', 'verified']);

// auth Middleware
Route::get('/movie/{slug}', [MovieController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/show/{slug}', [MovieController::class, 'show'])->middleware(['auth', 'verified']);


// admin middleware
Route::get('add', [AddMovieController::class, 'index'])->name('add.movie');
Route::post('add', [AddMovieController::class, 'get'])->name('get.movie');
Route::post('store', [AddMovieController::class, 'store'])->name('store.movie');




// Testing route
Route::get('test', [HomeController::class, 'test']);


Route::post('/webhook', [WebhookController::class, 'handleWebhook']);