<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(5);

        return view('admin.manajemen-produk.index', compact('products'));
    }

    public function create()
    {
        return view('admin.manajemen-produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        // Buat direktori jika belum ada
        $uploadPath = '/home/rezk7761/public_html/product';
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        // Handle upload gambar
        $image = $request->file('image');
        // Buat nama unik
        $slug = Str::slug($request->name);
        $uniqueName = $slug . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $image->move($uploadPath, $uniqueName);
        $imagePath = 'product/' . $uniqueName;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return redirect()->route('admin.data-barang.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.manajemen-produk.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldImagePath = '/home/rezk7761/public_html/' . $product->image;
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload gambar baru
            $uploadPath = '/home/rezk7761/public_html/product';
            $image = $request->file('image');
            $slug = Str::slug($request->name);
            $uniqueName = $slug . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $uniqueName);
            $data['image'] = 'product/' . $uniqueName;
        }

        $product->update($data);

        return redirect()->route('admin.data-barang.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar dari folder public_html/product
        $imagePath = '/home/rezk7761/public_html/' . $product->image;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();

        return redirect()->route('admin.data-barang.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    // public function index(Request $request)
    // {
    //     $search = $request->input('search');

    //     $products = Product::when($search, function ($query) use ($search) {
    //         return $query->where('name', 'like', '%' . $search . '%');
    //     })
    //         ->latest()
    //         ->paginate(5);

    //     return view('admin.manajemen-produk.index', compact('products'));
    // }

    // public function create()
    // {
    //     return view('admin.manajemen-produk.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'status' => 'required|in:active,inactive'
    //     ]);

    //     // Buat direktori jika belum ada
    //     $uploadPath = public_path('product');
    //     if (!File::exists($uploadPath)) {
    //         File::makeDirectory($uploadPath, 0777, true, true);
    //     }

    //     // Handle upload gambar
    //     $image = $request->file('image');
    //     // Buat nama unik
    //     $slug = Str::slug($request->name);
    //     $uniqueName = $slug . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    //     $image->move($uploadPath, $uniqueName);
    //     $imagePath = 'product/' . $uniqueName;

    //     Product::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'stock' => $request->stock,
    //         'image' => $imagePath,
    //         'status' => $request->status
    //     ]);

    //     return redirect()->route('admin.data-barang.index')
    //         ->with('success', 'Produk berhasil ditambahkan');
    // }

    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('admin.manajemen-produk.edit', compact('product'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'status' => 'required|in:active,inactive'
    //     ]);

    //     $data = [
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'stock' => $request->stock,
    //         'status' => $request->status
    //     ];

    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama jika ada
    //         $oldImagePath = public_path($product->image);
    //         if (File::exists($oldImagePath)) {
    //             File::delete($oldImagePath);
    //         }

    //         // Upload gambar baru
    //         $uploadPath = public_path('product');
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move($uploadPath, $imageName);
    //         $data['image'] = 'product/' . $imageName;
    //     }

    //     $product->update($data);

    //     return redirect()->route('admin.data-barang.index')
    //         ->with('success', 'Produk berhasil diperbarui');
    // }

    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);

    //     // Hapus gambar dari folder public/product
    //     $imagePath = public_path($product->image);
    //     if (File::exists($imagePath)) {
    //         File::delete($imagePath);
    //     }

    //     $product->delete();

    //     return redirect()->route('admin.data-barang.index')
    //         ->with('success', 'Produk berhasil dihapus');
    // }
}