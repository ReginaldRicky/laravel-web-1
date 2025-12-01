<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt($input)) {
            $request->session()->regenerate();

            // Cek role user yang sedang login
            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard'); // Arahkan Admin
            }

            // Jika bukan admin → user biasa
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
