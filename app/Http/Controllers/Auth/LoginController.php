<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        // Authenticates the user using the email and password from the request
        if (Auth::attempt($request->only(['email', 'password']))) {
            if (!Auth::user()->hasRole('Administrator')) {
                return redirect('/books');
            }

            return redirect('/dashboard');
        }

        // redirect backs the user if authentication attempt failed
        // add the key value pairs in the session using the `with(...)` method
        return redirect()->back()->with('errorResponse', 'Authentication failed.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
