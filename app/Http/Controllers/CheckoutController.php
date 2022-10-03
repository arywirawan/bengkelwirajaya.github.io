<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;
use App\Models\DetilBahan;
use App\Models\Pesanan;

class CheckoutController extends Controller
{
    public function index(){
        $user = auth()->user();
        $cart = session('cart');
        $totalbahan = 0;

        foreach($cart as $id => $details){
            $totalbahan = $totalbahan + $details['total_bahan'];
            
        }
        $menu = 'user';
        return view ('homepage.checkout', compact('menu','user','cart','totalbahan'));
    }

    public function checkout(Request $request)
    {
        $input = $request->all();
        $input['produk_id'] = implode(",", $input['produk_id']);
        $input['panjang'] = implode(",", $input['panjang']);
        $input['lebar'] = implode(",", $input['lebar']);
        $input['kuantitas'] = implode(",", $input['kuantitas']);
        $input['status'] = 'Belum Dibayar';
        $input['keterangan'] = 'Belum Diterima';

        Pesanan::create($input);

        $produk_id = explode(',', $input['produk_id']);
        
        foreach ($produk_id as $keyproduk => $value) {
            $getdetil = DetilBahan::where('produk_id',$value)->first();
            $bahan_id = explode(',', $getdetil->bahan_id);
            $jumlah_item = explode(',', $getdetil->jumlah_item);
            $kuantitas = explode(',', $input['kuantitas']);
            foreach($bahan_id as $keybahan => $value){
                $getbahan = Bahan::findOrFail($value);
                $getbahan->stok = $getbahan->stok - ($jumlah_item[$keybahan] * $kuantitas[$keyproduk]);
                $getbahan->save();
            }

        }
        session()->forget('cart');

        return redirect()->route('pesanan')->with('success','Data berhasil dicheckout');

    }
}
