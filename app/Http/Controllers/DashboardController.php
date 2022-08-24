<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
     public function index() {
        $pesanan = Pesanan::all();
        $user = User::all();
        $produk = Produk::all();
        $pembayaran = Pembayaran::all();
        return view('dashboard.index', compact('pesanan', 'user', 'produk', 'pembayaran'));
    }

    public function profil (){
        return view('dashboard.profil');
    }

    public function profiledit(Request $request){
          $request->validate([
            'name' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
        ]);
        $data = User::find(auth()->user()->id);
        if (isset($data)) {
            $data->name  = $request->name;
            $data->email = $request->email;
            $data->notelp = $request->notelp;
            $data->alamat = $request->alamat;
            $data->save();
            return back();
        }
        return back();
     }

     public function profilfoto(Request $request){
         
           $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
     
        $data = User::find(auth()->user()->id);
        
        if (isset($data)) {
            if ($request->file('image')) {
                if (auth()->user()->image && auth()->user()->image !== "profile-images/Master.png") {
                    Storage::delete(auth()->user()->image);
                }
                $gambar = $request->file('image')->store('profile-images');
                $data->image = $gambar;
                $data->save();
            }
            return back();
        }
        return back();
     }
}
    