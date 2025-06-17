<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
class RiwayatController extends Controller
{


    public function index()
    {
        $userId = Auth::id();

        $riwayat = Shop::with('details.product')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        return view('riwayat', compact('riwayat'));
    }

}
