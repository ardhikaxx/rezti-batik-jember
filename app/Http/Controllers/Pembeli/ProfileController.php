<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $pembeli = Auth::guard('pembeli')->user();
        return view('pembeli.profile.index', compact('pembeli'));
    }

    public function edit()
    {
        $pembeli = Auth::guard('pembeli')->user();
        return view('pembeli.profile.edit', compact('pembeli'));
    }

    public function update(Request $request)
    {
        // Dapatkan user yang login
        $user = Auth::guard('pembeli')->user();
        
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pembelis,email,'.$user->id,
            'no_hp' => 'required|string|max:20',
        ]);

        // Gunakan query builder sebagai fallback
        $updated = Pembeli::where('id', $user->id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp
            ]);

        if (!$updated) {
            return back()->withErrors(['error' => 'Gagal memperbarui profil']);
        }

        return redirect()->route('pembeli.profile.index')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::guard('pembeli')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Gunakan query builder sebagai fallback
        $updated = Pembeli::where('id', $user->id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        if (!$updated) {
            return back()->withErrors(['error' => 'Gagal memperbarui password']);
        }

        return back()->with('success', 'Password berhasil diperbarui');
    }
}