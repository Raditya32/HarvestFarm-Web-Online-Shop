<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class GudangController extends Controller
{
            public function index()
        {
            // Ambil kategori dan total stok per kategori
            $data = Categories::with(['products' => function ($q) {
                $q->select('id', 'category_id', 'stock');
            }])->get();

            $chartCategories = [];
            $chartStocks = [];

            foreach ($data as $category) {
                $chartCategories[] = $category->name;
                $chartStocks[] = $category->products->sum('stock');
            }

            return view('gudang', compact('chartCategories', 'chartStocks'));
        }
}
