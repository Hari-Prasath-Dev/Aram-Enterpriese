<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication/forgotPassword');
    }

    public function signin()
    {
        return view('authentication/signin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);

        $checkUser = User::where('email', $request->username)->first();

        if (!$checkUser) {
            return redirect()->back()->withInput()
                ->withErrors(['errors' => "Sorry, we don't recognize this account."]);
        }

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            $checkUser->update(['last_login_at' => now()]);

            return redirect()->route('index')->with([
                'message' => 'Login Successful',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->withInput()
            ->withErrors(['errors' => "Wrong password. please enter the correct password."]);
    }
    
    public function signup()
    {
        return view('authentication/signup');
    }
}
