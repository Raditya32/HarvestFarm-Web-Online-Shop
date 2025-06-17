<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index(Request $request){
        $productQuery = Products::query()->with('category');

        if ($request->filled('search')) {
            $productQuery->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('category_id') && $request->category_id != '0') {
            $productQuery->where('category_id', $request->category_id);
        }

        $products = $productQuery->latest()->paginate(9); // Paginasi, misal 9 produk per halaman
        $categories = Categories::orderBy('name')->get();

        return view('shop.read', [
            'categories' => $categories,
            'products' => $products,
        ]);
            $productQuery = Products::query()->with('category');
        if ($request->filled('search')) {
            $productsQuery->where('name', 'like', "%{$request->search}%");
        }
        if ($request->filled('category_id') && $request->category_id != '0') {
            $productQuery->where('category_id', $request->category_id);
        }
        $paginatedProduct = $productQuery->latest()->paginate(9); // Produk utama dengan paginasi

        $categories = Categories::orderBy('name')->get();

        // Tambahkan ini untuk 5 produk unggulan/terbaru:
        $featuredProduct = Products::with('category')->latest()->take(5)->get(); // Ambil 5 produk terbaru

        if (!session('shop')) {
            session(['shop' => [
            'customer' => Auth::user()->name,
            'user_id' => Auth::id(),
            'details' => []
    ]]);
}

        return view('shop.read', [
            'categories' => $categories,
            'products' => $paginatedProducts, // Ini untuk daftar produk utama Anda
            'featuredProducts' => $featuredProducts, // Ini untuk 5 konten yang baru
        ]);
  }

    public function show(Shop $shop)
    {
        // dd('Route show() berhasil diakses');
        return view('shop.show', ['shop' => $shop]);
    }

    public function create(Products $product)
{
    $shop = session('shop', ['details' => []]);
    $detail = null;

    if (isset($shop['details'][$product->id])) {
        $detail = $shop['details'][$product->id];
    }

    return view('shop.create', [
        'product' => $product,
        'detail' => $detail,
    ]);
}

public function store(Request $request, Products $product)
{
    $shop = session('shop', ['details' => []]);

    $request->validate([
        'qty' => 'required|numeric|min:1',
    ]);

    $newQty = $request->qty;
    $oldQty = $shop['details'][$product->id]['qty'] ?? 0;

    $availableStock = $product->stock;

    // Hitung stok "real-time" berdasarkan perubahan qty di keranjang
    $diffQty = $newQty - $oldQty;
    if ($diffQty > 0 && $diffQty > $product->stock) {
        return back()->withErrors(['qty' => 'Stok tidak mencukupi untuk perubahan jumlah.']);
    }

    // Update keranjang
    $shop['details'][$product->id] = [
        'product_id' => $product->id,
        'qty' => $newQty,
        'price' => $product->price,
    ];

    session(['shop' => $shop]);

    return redirect()->route('shop.read');
}


 public function checkout(Request $request)
{
    $request->validate([
        'customer' => 'required',
        'payment' => 'required|numeric',
        'alamat' => 'required|String'
    ]);

    $sessionShop = session('shop');

    if (!$sessionShop || empty($sessionShop['details'])) {
        return back()->with('error', 'Keranjang kosong');
    }

    $total = 0;

    //  Validasi ulang stok dan hitung total
    foreach ($sessionShop['details'] as $detail) {
        $product = Products::find($detail['product_id']);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($product->stock < $detail['qty']) {
            return back()->with('error', "Stok tidak mencukupi untuk produk: {$product->name}");
        }

        $total += $detail['qty'] * $detail['price'];
    }

    $adminFee = 2500;
    $grandTotal = $total + $adminFee;

    if ($request->payment < $grandTotal) {
        return back()->withInput()->withErrors([
            'payment' => 'Pembayaran kurang dari total (termasuk biaya admin)'
        ]);
    }
    if (!$request->alamat) {
        return back()->withInput()->withErrors([
            'alamat' => 'Alamat Kosong'
        ]);
    }

    // Simpan transaksi ke database
    $shop = Shop::create([
        'customer' => $request->customer,
        'payment' => $request->payment,
        'total' => $grandTotal,
        'user_id' => Auth::id(),
        'alamat' => $request->alamat,
    ]);

    foreach ($sessionShop['details'] as $detail) {
        $product = Products::find($detail['product_id']);

        // Simpan ke tabel detail
        $shop->details()->create($detail);

        // Kurangi stok produk di database
        $product->decrement('stock', $detail['qty']);
    }

    // Bersihkan session keranjang
    $request->session()->forget('shop');

    return redirect()->route('shop.notifikasi', ['shop' => $shop->id])
    ->with('success', 'Checkout berhasil! Stok telah diperbarui.');



}
        public function notifikasi(Shop $shop)
        {
            return view('shop.notifikasi', compact('shop'));
        }




    public function cancel()
{
    session()->forget('shop');
    return redirect()->route('shop.read')->with('status', 'Cart successfully emptied.');
}


}
