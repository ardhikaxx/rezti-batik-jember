<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use App\Models\ShippingAddress;
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
            return redirect()->intended(route('index'));
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
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pembeli = Pembeli::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        ShippingAddress::create([
            'pembeli_id' => $pembeli->id,
            'recipient_name' => $request->nama,
            'phone_number' => $request->no_hp,
            'address' => $request->alamat,
            'is_default' => true
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

    public function showForgotPasswordForm()
    {
        return view('pembeli.auth.verifikasi');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $pembeli = Pembeli::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak terdaftar']);
        }

        return redirect()->route('pembeli.password.reset', ['email' => $request->email]);
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('pembeli.auth.forgot-password', [
            'email' => $request->email
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pembeli = Pembeli::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak terdaftar']);
        }

        $pembeli->password = Hash::make($request->password);
        $pembeli->save();

        return redirect()->route('pembeli.login')->with('success', 'Password berhasil diubah! Silakan login dengan password baru Anda.');
    }
}