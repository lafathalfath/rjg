<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginView() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'name_or_email' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);
        $user = User::where('name', $request->name_or_email)->first();
        if (!$user) $user = User::where('email', $request->name_or_email)->first();
        if (!$user) return back()->withErrors('User not registered');
        $password_matched = Hash::check($request->password, $user->password);
        if (!$password_matched) return back()->withErrors("Password doesn't matched");
        $attempt = Auth::attempt(['email' => $user->email, 'password' => $request->password]);
        $api_token = $user->createToken($user->name);
        $api_token = str_replace($api_token->accessToken->id.'|', '', $api_token->plainTextToken);
        session(['api_token', $api_token]);
        return redirect()->route('dashboard')->with('success', 'Logged in successfully');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

}
