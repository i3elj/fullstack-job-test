<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/dashboard", fn() => view("dashboard"))
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::get("/", fn() => "API Fullstack Job Test - DomPixel running");
Route::get("/products", [ProductsController::class, "view"])->name(
    "products.view"
);
Route::get("/products/new", [ProductsController::class, "new"])->name(
    "products.new"
);
Route::get("/products/{id}", [ProductsController::class, "edit"])->name(
    "products.edit"
);
Route::post("/products", [ProductsController::class, "create"])->name(
    "products.create"
);
Route::put("/products/{id}", [ProductsController::class, "update"])->name(
    "products.update"
);
Route::delete("/products/{id}", [ProductsController::class, "delete"])->name(
    "products.delete"
);

Route::middleware("auth")->group(function () {});

require __DIR__ . "/auth.php";
