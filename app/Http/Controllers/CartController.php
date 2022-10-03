<?php

namespace App\Http\Controllers;

use App\Models\DetilBahan;
use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    public function index(){
        if (!auth()->check()) {
            return redirect('/login');
        }
        $menu = 'user';
        return view ('homepage.cart', compact('menu'));
    }

    public function addcart($id,Request $request){
        $produk = Produk::find($id);
        $detilbahan = DetilBahan::where('produk_id',$id)->first();
        if(!$produk) {
            abort(404);
        }
        $menu = 'user';
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                    $id => [
                        "nama_produk" => $produk->nama_produk,
                        "kuantitas" => $request->kuantitas,
                        "harga_jasa" => $produk->harga_jasa,
                        "foto_produk" => $produk->foto_produk,
                        "panjang" => $request->panjang,
                        "lebar" => $request->lebar,
                        "total" => $request->kuantitas * $produk->harga_jasa,
                        "total_bahan" => $detilbahan->total_harga * $request->kuantitas,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('sukses', 'Sukses menambah ke cart! Silahkan periksa cart anda!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['kuantitas']+=$request->kuantitas;
            $cart[$id]['total']+=$produk->harga_jasa*$request->kuantitas;
            $cart[$id]['total_bahan']+=$detilbahan->total_harga*$request->kuantitas;
            session()->put('cart', $cart);
            return redirect()->back()->with('sukses', 'Sukses menambah ke cart! Silahkan periksa cart anda!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "nama_produk" => $produk->nama_produk,
            "kuantitas" => $request->kuantitas,
            "harga_jasa" => $produk->harga_jasa,
            "foto_produk" => $produk->foto_produk,
            "panjang" => $request->panjang,
            "lebar" => $request->lebar,
            "total" => $request->kuantitas * $produk->harga_jasa,
            "total_bahan" => $detilbahan->total_harga * $request->kuantitas,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('sukses', 'Sukses menambah ke cart! Silahkan periksa cart anda!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->kuantitas)
        {
            $produk = Produk::find($request->id);
            $detilbahan = DetilBahan::where('produk_id',$request->id)->first();
            $cart = session()->get('cart');
            $cart[$request->id]["kuantitas"] = $request->kuantitas;
            $cart[$request->id]["total"] = $produk->harga_jasa * $request->kuantitas;
            $cart[$request->id]["total_bahan"] = $detilbahan->total_harga * $request->kuantitas;
            session()->put('cart', $cart);
            session()->flash('sukses', 'Sukses update cart!');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('sukses', 'Produk sukses dihapus dari cart!');
        }
    }
}
