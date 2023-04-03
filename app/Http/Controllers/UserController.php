<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            // "role" => $request->role
        ]);
        return $user;
    }


    public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))) {
            return "try again";
        }
        return Auth::user()->createToken('phone')->plainTextToken;   
    }
}
