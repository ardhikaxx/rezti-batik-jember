<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pembeli.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pembeli')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('pembeli.index'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('pembeli.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pembelis',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pembeli = Pembeli::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('pembeli')->login($pembeli);

        return redirect(route('pembeli.index'));
    }

    public function logout(Request $request)
    {
        Auth::guard('pembeli')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}