<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\DetilBahan;
use App\Models\Invoice;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class HomepageController extends Controller
{
     public function index() {
 
     //    $title = array('title' => 'Beranda | Bengkel Las Wira Jaya');
        $produk = Produk::orderBy('created_at','desc')->paginate(4);
        $menu = 'beranda';
        return view('homepage.index', compact( 'produk', 'menu'));
     }

     public function shop(){
        $produk = Produk::latest();
        $no = 0;
        if (request('keyword')) {
         $produk = $produk->where('nama_produk', 'like', '%'.request('keyword').'%');
        }
         $menu = 'produk';
        $produk = $produk->paginate(7);
          return view('homepage.shop', compact('menu', 'produk'));
     }

     public function profil(){
          $menu = 'user';
          $dropdown = 'profil';
          return view('homepage.profiluser', compact('menu', 'dropdown'));
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

     public function detilshop($id){
        $produk = Produk::find($id);
        // $detilBahan = DB::table('detil_bahans')->where('produk_id', $produk->id)->get();
        $menu = 'produk';
        return view('homepage.detilshop', compact('produk','menu',));

     }
    
}
