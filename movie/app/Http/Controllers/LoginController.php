<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            $name = auth()->user()->name;
            $email = auth()->user()->email;

            return redirect('movies')->with($name);
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $user_email = $request->input('email');
        $user_password = $request->input('password');
        $data = [
            'email' => $user_email,
            'password' => $user_password,
        ];
        // if($this->isValid($user_email, $user_password)) {
        if (Auth::attempt($data)) {
            return redirect()->intended('/movies');
        } else {
            return redirect()->intended('/login')->with('error', 'Incorrect Email or Password');
        }
    }
}
