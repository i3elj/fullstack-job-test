<?php

use App\Http\Controllers\ProductsController;
use App\Http\Middleware\MakeSureIsAuth;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => "API Fullstack Job Test - DomPixel running");

Route::middleware(MakeSureIsAuth::class)->group(function () {
    Route::get("/products", [ProductsController::class, "view"])->name("products.view");
    Route::get("/products/new", [ProductsController::class, "new"])->name("products.new");
    Route::get("/products/{id}", [ProductsController::class, "edit"])->name("products.edit");
    Route::post("/products", [ProductsController::class, "create"])->name("products.create");
    Route::put("/products/{id}", [ProductsController::class, "update"])->name("products.update");
    Route::delete("/products/{id}", [ ProductsController::class, "delete"])->name("products.delete");
});

require __DIR__ . "/auth.php";
