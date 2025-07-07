<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ManajemenAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $admins = Admin::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
        })
        ->orderBy('nama_lengkap')
        ->paginate(5);

        return view('admin.manajemen-admin.index', compact('admins', 'search'));
    }

    public function create()
    {
        return view('admin.manajemen-admin.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'telepon' => 'required|string|max:15',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'email' => 'required|string|email|max:255|unique:admins',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            Admin::create([
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.manajemen-admin.index')
                ->with('success', 'Admin baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan admin: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.manajemen-admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::findOrFail($id);

            $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'telepon' => 'required|string|max:15',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
                'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            ]);

            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $admin->update($data);

            return redirect()->route('admin.manajemen-admin.index')
                ->with('success', 'Data admin berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui admin: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->delete();

            return redirect()->route('admin.manajemen-admin.index')
                ->with('success', 'Admin berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }
}