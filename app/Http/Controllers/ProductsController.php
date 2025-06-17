<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class ProductsController extends Controller
{
   public function index(Request $request)
{
    $productsQuery = Products::query()->with('category');

    if ($request->filled('search')) {
        $productsQuery->where('name', 'like', "%{$request->search}%");
    }

    if ($request->filled('category_id') && $request->category_id != '0') {
        $productsQuery->where('category_id', $request->category_id);
    }

    $paginatedProducts = $productsQuery->latest()->paginate(9); // Produk utama
    $categories = Categories::orderBy('name')->get();
    $featuredProducts = Products::with('category')->latest()->take(5)->get(); // Produk unggulan

    return view('products.read', [
        'categories' => $categories,
        'products' => $paginatedProducts,
        'featuredProducts' => $featuredProducts,
    ]);
    dd($product->category);
}


    public function create()
    {
        $categories = Categories::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Max 2MB
        ]);

        $productData = $request->only(['name', 'description', 'price', 'stock', 'category_id']);

        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('product_images', 'public');
                $productData['image'] = $imagePath;
            } catch (\Exception $e) {
                return back()->withInput()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
            }
        }

        try {
            Products::create($productData);
            return redirect()->route('products.read')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            if (isset($productData['image']) && Storage::disk('public')->exists($productData['image'])) {
                Storage::disk('public')->delete($productData['image']);
            }
            return back()->withInput()->with('error', 'Gagal menambahkan produk ke database: ' . $e->getMessage());
        }
    }

    public function show(Products $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }


    public function edit(Products $product)
    {
        $categories = Categories::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $productData = $request->only(['name', 'description', 'price', 'stock', 'category_id', 'image']);

        if ($request->hasFile('image')) {
            try {
                // Hapus gambar lama jika ada dan bukan placeholder
                if ($product->image && Storage::disk('public')->exists($product->image) && $product->image !== 'path/to/default/placeholder.png') {
                    Storage::disk('public')->delete($product->image);
                }
                $imagePath = $request->file('image')->store('product_images', 'public');
                $productData['image'] = $imagePath;
            } catch (\Exception $e) {
                return back()->withInput()->with('error', 'Gagal mengupload gambar baru: ' . $e->getMessage());
            }
        }

        try {
            $product->update($productData);
            return redirect()->route('products.read')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika gambar baru terupload tapi gagal update DB, hapus gambar barunya (jika ada)
            if ($request->hasFile('image') && isset($productData['image']) && Storage::disk('public')->exists($productData['image'])) {
                 Storage::disk('public')->delete($productData['image']);
            }
            return back()->withInput()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }


    public function destroy(Products $product)
    {
        try {
            // Hapus gambar dari storage jika ada dan bukan placeholder
            if ($product->image && Storage::disk('public')->exists($product->image) && $product->image !== 'path/to/default/placeholder.png') {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
            return redirect()->route('products.read')->with('success', 'Produk berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('products.read')->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
