<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\UserAuthenticate;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"]);
Route::post("/subscribe", [HomeController::class,"subscribe"]);
Route::get("/unsubscribe", [HomeController::class,"unsubscribe"]);
Route::get("/login", [LoginRegisterController::class, "indexLogin"])->middleware(UserAuthenticate::class);
Route::post("/login", [LoginRegisterController::class, "login"]);
Route::get("/register", [LoginRegisterController::class, "indexRegister"])->middleware(UserAuthenticate::class);
Route::post("/register", [LoginRegisterController::class, "register"]);
Route::post("/logout", [LoginRegisterController::class, "logout"]);

Route::get("/validate", function() {
    // Mungkin redirect ke halaman validasi atau berikan pesan
})->middleware(Authenticate::class);
Route::post("/validate", [LoginRegisterController::class, "validate"]);

Route::get("/setting", [UserController::class, "index"])->middleware(Authenticate::class);
Route::post("/setting/update", [UserController::class, "update"]);
Route::get("/setting/update-role", [UserController::class, "updateRoleIndex"])->middleware(Authenticate::class);
Route::post("/setting/update-role", [UserController::class, "updateRole"]);

Route::get("/dashboard", [DashboardController::class, "index"])->middleware(Authenticate::class);
Route::get("/add-event", [EventController::class, "addEvent"])->middleware(Authenticate::class);
Route::get("/get-room", [EventController::class, "getRoom"])->middleware(Authenticate::class)->name('get-room');
Route::get("/get-time", [EventController::class, "getTime"])->middleware(Authenticate::class)->name('get-time');
Route::post("/add-event", [EventController::class, "storeEvent"])->middleware(Authenticate::class);

Route::get("/events", [EventController::class, "index"]);
Route::get("/events/{slug}", [EventController::class, "authorIndex"]);
Route::get("/event/{slug}", [EventController::class, "eventIndex"]);
Route::get("/event/join-event/{slug}", [EventController::class, "joinEvent"])->middleware(Authenticate::class);
Route::get("/event/cancel-event/{slug}", [EventController::class, "cancelEvent"])->middleware(Authenticate::class);
Route::get("/event/edit-event/{slug}", [EventController::class, "editEvent"])->middleware(Authenticate::class);
Route::get("/event/delete-event/{slug}", [EventController::class, "deleteEvent"])->middleware(Authenticate::class);
Route::post("/event/edit-event/{slug}", [EventController::class, "updateEvent"])->middleware(Authenticate::class);
Route::get("/event/download-file/{slug}", [EventController::class, "downloadFile"])->middleware(Authenticate::class);



Route::get("test", [HomeController::class,"test"]);