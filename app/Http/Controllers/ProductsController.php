<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a list of products.
     */
    public function view(Request $request): View
    {
        return view("products");
    }

    /**
     * Display a specific product for edition.
     */
    public function edit(Request $request): View
    {
        return view("products");
    }

    /**
     * Update a specific product.
     */
    public function update(Request $request): View
    {
        return view("products");
    }

    /**
     * Display a page for adding a new product.
     */
    public function new(Request $request): View
    {
        return view("products");
    }

    /**
     * Deletes a product in the database.
     */
    public function delete(Request $request): View
    {
        return view("products");
    }
}
