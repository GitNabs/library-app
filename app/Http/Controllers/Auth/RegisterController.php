<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register', [
            'roles' => Role::all()
        ]);
    }

    public function register(RegisterRequest $request)
    {

        User::create($request->validated())->assignRole($request->role_id);
        
        

        if (Auth::attempt($request->only(['email', 'password']))) {
            if (!Auth::user()->hasRole('Administrator')) {
                return redirect('/books');
            }

            return redirect('/dashboard');
        }
    }


}
