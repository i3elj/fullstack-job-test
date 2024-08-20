<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\MakeSureIsAuth;
use Illuminate\Support\Facades\Route;

Route::get("/login", [AuthController::class, "view"])
    ->middleware("guest")
    ->name("login.view");

Route::post("/login", [AuthController::class, "login"])
    ->middleware("guest")
    ->name("login");

Route::post("/logout", [AuthController::class, "logout"])
    ->middleware(MakeSureIsAuth::class)
    ->name("logout");
