<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/dashboard", fn() => view("dashboard"))
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::get("/", fn() => "API Fullstack Job Test - DomPixel running");
Route::get("/products", [ProductsController::class, "view"]);

Route::middleware("auth")->group(function () {
    Route::get("/products/{id}", [ProductsController::class, "edit"])->name(
        "products.edit"
    );
    Route::post("/products", [ProductsController::class, "new"])->name(
        "products.new"
    );
    Route::put("/products/{id}", [ProductsController::class, "update"])->name(
        "products.update"
    );
    Route::delete("/products/{id}", [
        ProductsController::class,
        "delete",
    ])->name("products.delete");
});

require __DIR__ . "/auth.php";
