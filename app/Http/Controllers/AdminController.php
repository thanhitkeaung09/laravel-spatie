<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $user = Admin::create([
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            // "role" => $request->role
        ]);
        return $user;
    }


    public function login(Request $request)
    {
        $admin = Admin::query()->where('email', $request->email)->first();
        if (!$admin) {
            return '';
        }

        if (Hash::check($request->password, $admin->password)) {
            return $admin->createToken($admin->email)->plainTextToken;
        }
    }
}
