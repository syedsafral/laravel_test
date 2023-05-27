<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('welcome');
    }


    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {

        $token = Str::random(30);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'email.unique' => 'Email Already Exists',
            'password.required' => 'Password is Required',
            'password.min:8' => 'Password should be 8 Characters'
        ]
    );
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = $token;

        $user = User::create($validatedData);

        return redirect('/')->with(['message' => 'User registered successfully']);
        // return response()->json(['message' => 'User registered successfully'], 201);

    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            return 123;
        } else {
            return redirect()->back()->with('erorr', 'Invalid Credentials');
            // return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function sendMail(Request $request)
    {
       return 123; 
    }
}

