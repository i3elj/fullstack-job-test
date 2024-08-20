<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController
{
    /**
     * Displays the login page.
     */
    public function view(Request $request): View
    {
        return view("auth.login");
    }

    /**
     * Set an "auth" cookie to act as authentication.
     */
    public function login(Request $request): RedirectResponse
    {
        return redirect()->route("products.view")->cookie("auth", "secret");
    }

    /**
     * Deletes a cookie.
     */
    public function logout(Request $request): RedirectResponse
    {
        return redirect()->route("login")->cookie("auth", "nosecret");
    }
}
