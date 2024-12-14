<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

    
        $user = Auth::user();
        return response()->json([
            'status' => 'error',
            'redirect' => $user->hasRole('admin') || $user->hasRole('moderator') 
                    ? route('dashboard') 
                    : route('home')
        ]);

    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'login' => 'required|string|unique:users,login',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('user');
        Auth::login($user);

        return response()->json([
            'status' => 'success',
            'redirect' => '/'
        ]);
    }
}