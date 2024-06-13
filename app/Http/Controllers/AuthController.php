<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registersimpan(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email', // Menambahkan aturan unik untuk email
            'password' => 'required|confirmed',
            'level' => 'required|in:admin,petugas_pendaftaran,dokter,apotek,perawat' // Menambahkan validasi untuk level
        ])->validate();

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level // Menggunakan nilai dari input form untuk level
        ]);

        // Setelah menyimpan data pengguna
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAksi(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
