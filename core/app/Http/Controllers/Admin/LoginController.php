<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages/login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);
        if ($request->role == "petugas") {
            info('petugas');
            if (auth('petugass')->attempt($request->except(['role', '_token']))) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }
        } else {
            info('masyarakat');
            if (auth('masyarakats')->attempt($request->except(['role', '_token']))) {
                info('masyarakat berhasil');
                $request->session()->regenerate();
                return redirect()->route('masyarakat.home');
            }
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
