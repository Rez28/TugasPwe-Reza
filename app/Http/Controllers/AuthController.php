<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Fungsi untuk proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Redirect berdasarkan role
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect()->route('admin.percobaan1'); // Redirect ke percobaan1 untuk admin
            } else {
                return redirect()->route('user.percobaan1'); // Redirect ke percobaan1 untuk user
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    // Fungsi untuk menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('register');
    }

    // Fungsi untuk proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set role ke 'user' secara otomatis
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        if($user->role == 'admin'){
            return redirect('/admin/percobaan1');
        }else{
            return redirect('/user/percobaan1');
        }
    }

    // Fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
