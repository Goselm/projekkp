<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('tampilan.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->is_admin) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors(['email' => 'You do not have admin access.'])->withInput();
            }
        }
    
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function dashboard()
    {
        return redirect()->route('kembali');
        //return view('kembali');
    }

    public function logout()
    {
    Auth::logout();
    return redirect()->route('tampilan.home');
    }
}
