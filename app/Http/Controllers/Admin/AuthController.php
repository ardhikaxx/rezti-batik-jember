<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function showForgotPasswordForm()
    {
        return view('admin.auth.verifikasi');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $pembeli = Admin::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak terdaftar']);
        }

        return redirect()->route('admin.password.reset', ['email' => $request->email]);
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('admin.auth.forgot-password', [
            'email' => $request->email
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pembeli = Admin::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak terdaftar']);
        }

        $pembeli->password = Hash::make($request->password);
        $pembeli->save();

        return redirect()->route('admin.login')->with('success', 'Password berhasil diubah! Silakan login dengan password baru Anda.');
    }
}