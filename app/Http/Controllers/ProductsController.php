<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a list of products.
     */
    public function view(Request $request): View
    {
        $products = Product::all();
        return view("products.view", ["products" => $products]);
    }

    /**
     * Display a page for adding a new product.
     */
    public function new(Request $request): View
    {
        return view("products.new");
    }

    /**
     * Display a specific product for edition.
     */
    public function edit(Request $request, int $id): View
    {
        $product = Product::where("id", $id)->first();
        Log::debug($product->name);
        Log::debug($id);
        return view("products.edit", ["product" => $product]);
    }

    /**
     * Create a new record in the database.
     */
    public function create(Request $request): RedirectResponse
    {
        $name = $request->input("name");
        $category = $request->input("category");
        $price = $request->input("price");

        $product = new Product();
        $product->name = $name;
        $product->category = $category;
        $product->price = $price;
        $product->save();

        return redirect()->route("products.view");
    }

    /**
     * Update a record in the database.
     */
    public function update(Request $request): void
    {
    }

    /**
     * Deletes a record in the database.
     */
    public function delete(Request $request): void
    {
    }
}
