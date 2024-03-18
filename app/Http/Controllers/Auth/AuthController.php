<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login 
    public function login_view()
    {
        return view('auth.login');
    }

    public function login_submit(Request $request)
    {
        $credenticals = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credenticals)) {
            if (Auth::guard('web')->user()->role == 'student') {
                return redirect()->route('index');
            }
        }

        return redirect()->route('login');
            
    }

    // Register
    public function register_view()
    {
        return view('auth.register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email'=> 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'student';

        $user->save();

        return view('auth.register_success');

    }
}