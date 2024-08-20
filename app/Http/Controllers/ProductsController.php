<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
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
    public function create(Request $request): JsonResponse
    {
        $resp = ["success" => true, "msgs" => []];

        $name = $request->input("name");
        $resp = $this->verifyName($name, $resp);

        $category = $request->input("category");
        $resp = $this->verifyCategory($category, $resp);

        $price = $request->input("price");
        $resp = $this->verifyPrice($price, $resp);

        if ($resp["success"]) {
            $product = new Product();
            $product->name = $name;
            $product->category = $category;
            $product->price = $price;
            $product->save();
            array_push($resp["msgs"], "Item adicionado com sucesso");
        }

        return response()->json($resp);
    }

    /**
     * Update a record in the database.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $resp = ["success" => true, "msgs" => []];

        $name = $request->input("name");
        $resp = $this->verifyName($name, $resp);

        $category = $request->input("category");
        $resp = $this->verifyCategory($category, $resp);

        $price = $request->input("price");
        $resp = $this->verifyPrice($price, $resp);

        if ($resp["success"]) {
            $product = Product::where("id", $id)->first();
            $product->name = $name;
            $product->category = $category;
            $product->price = $price;
            $product->save();
            array_push($resp["msgs"], "Item atualizado com sucesso");
        }

        return response()->json($resp);
    }

    /**
     * Deletes a record in the database.
     * TODO: ask confirmation
     */
    public function delete(Request $request, int $id): RedirectResponse
    {
        Product::destroy($id);

        return redirect()->route("products.view");
    }

    private function verifyName(string|null $name, array $resp): array
    {
        if (!isset($name)) {
            $resp["success"] = false;
            array_push($resp["msgs"], "O nome do item nao pode estar vazio");
        }
        return $resp;
    }

    private function verifyCategory(string|null $category, array $resp): array
    {
        if (!isset($category)) {
            $resp["success"] = false;
            array_push($resp["msgs"], "O item precisa de uma categoria");
        }
        return $resp;
    }

    private function verifyPrice(string|null $price, array $resp): array
    {
        if (!isset($price)) {
            $resp["success"] = false;
            array_push($resp["msgs"], "O item precisa de um preco");
        }

        if (isset($price) && !preg_match("/^[0-9\.]*$/", $price)) {
            $resp["success"] = false;
            array_push(
                $resp["msgs"],
                "O preco do item nao pode conter letras ou simbolos especiais"
            );
        }

        return $resp;
    }
}
