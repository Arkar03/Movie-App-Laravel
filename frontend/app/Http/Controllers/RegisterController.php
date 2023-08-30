<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ];

    public function register(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ];
        // dd($data);
        $validator = Validator::make($data, $this->rules);
        if ($validator->passes()) {
            $user = User::create($data);
            $user->save();
            // echo 'pass';
            return redirect()->intended('/login')->with('correct', 'Register Succesfully. Please Login');
        } else {
            return redirect()->intended('/register')->with('error', 'Required Fields');
            // echo 'fail';

        }
    }
}
