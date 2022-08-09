<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index() {
        $pesanan = Pesanan::all();
        $user = User::all();
        $produk = Produk::all();
        $pembayaran = 0;
        return view('dashboard.index', compact('pesanan', 'user', 'produk', 'pembayaran'));
    }
}
