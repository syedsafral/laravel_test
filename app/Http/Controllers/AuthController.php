<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('erorr', 'Invalid Credentials');
            // return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function forgotPassword()
    {
       return view('pages.forgot_password'); 
    }

    public function sendMail(Request $request)
    {
        // return $request;
        $email_exist = User::where('email', $request->email)->first();
        if($email_exist){

        $data = [
            'email' => $request->email,
            'link' => url('/') . '/password_reset/' . $email_exist->remember_token
        ];
    

        Mail::send('emails.email_info', $data, function ($msg) use ($data, $request) {
           
            $msg->from('saiyedsafral@gmail.com');
            $msg->to($request->email, 'Fprgot Password');
            $msg->subject('Exsample forgot password');
        });
        // return $request;
       return redirect('/')->with('message', );
    }
    else{
        return redirect()->back()->with('erorr', 'Invailid Email');
    }

    }
    public function resetPassword(Request $request )
    { 
       

        $token = $request->route('token');
       return  view('pages.password_reset', compact('token'));
    }

    public function passwordReset(Request $request)
    {
        $credentials = $request->validate([
            'password' => 'required|confirmed',
            'password_confirmtion' => 'required',
        ],
        [
            'password.required' => 'Password is Required',
            'password_confirmtion.required' => 'Confirmtion Password is Required'
        ]
    );

        // return $request->token;
        
       $old_user = User::where('remember_token', $request->token)->first();
       if ($old_user) {
          if ($credentials){
              $old_user->password = hash::make($request->password);
              $old_user->save();
              return redirect('/login')->with('message', 'Password Reset Succsesfully');

          }
          else{
            return redirect()->back()->with('erorr', "Something went wrong");
          }


       }
       else{
        return redirect()->back()->with('erorr', 'Something went wrong');
       }
    }

}

