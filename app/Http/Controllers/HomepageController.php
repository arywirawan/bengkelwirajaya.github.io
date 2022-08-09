<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
     public function index() {
 
     //    $title = array('title' => 'Beranda | Bengkel Las Wira Jaya');
        $produk = Produk::orderBy('created_at','desc')->paginate(4);
        $menu = 'beranda';
        return view('homepage.index', compact( 'produk', 'menu'));
     }

     public function shop(){
          $produk = Produk::paginate(9);
          $menu = 'produk';
          return view('homepage.shop', compact('menu', 'produk'));
     }
}
