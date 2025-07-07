<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('admin'));
    }

    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$user->id,
            'telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $updated = Admin::where('id', $user->id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'updated_at' => now()
            ]);

        if (!$updated) {
            return back()->withErrors(['error' => 'Gagal memperbarui profil']);
        }

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        $updated = Admin::where('id', $user->id)
            ->update([
                'password' => Hash::make($request->new_password),
                'updated_at' => now()
            ]);

        if (!$updated) {
            return back()->withErrors(['error' => 'Gagal memperbarui password']);
        }

        return back()->with('success', 'Password berhasil diperbarui');
    }
}