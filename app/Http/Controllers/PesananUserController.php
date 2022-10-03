<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class PesananUserController extends Controller
{
    public function index(){    
        $list = Pesanan::all()->where('user_id', auth()->user()->id);
        $upload = Pembayaran::all();
        $menu = 'user';

        foreach ($list as $keylist => $item) {
            $produk_id = explode(',', $list[$keylist]->produk_id);
            $panjang = explode(',', $item->panjang);
            $lebar = explode(',', $item->lebar);
            $kuantitas = explode(',', $item->kuantitas);
            $listpesanan = [];
            foreach ($produk_id as $keyproduk => $value) {
                $getproduk = Produk::find($value);
                // falidasi data id menjadi nama
                array_push(
                    $listpesanan,
                    (object) [
                        'nama_produk' => $getproduk->nama_produk,
                        'panjang' =>$panjang[$keyproduk],
                        'lebar' =>$lebar[$keyproduk],
                        'kuantitas' =>$kuantitas[$keyproduk],
                    ]
                );
            }
            // menambahkan object baru "bahan"
            $list[$keylist]->listpesanan = $listpesanan;
        }

        return view('homepage.listpesanan',compact('menu', 'list', 'upload'));
    }

    public function upload(Request $request){
         $request->validate([
            'bukti_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       
        $input = $request->all();
  
  
        if ($image = $request->file('bukti_upload')) {
            $destinationPath = 'gambar/';
            $gambarUpload = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gambarUpload);
            $input['bukti_upload'] = "$gambarUpload";
        }
    
        Pembayaran::create($input);

        $pesanan = Pesanan::findOrFail($input['pesanan_id']);
        $pesanan->save();
         
        return redirect('/listpesanan')->with('success','Data berhasil disimpan!');

    }
    public function pesananselesai(Request $request, $id){       
       
        $data = Pesanan::where('id', 'like', $id )->first();
        if (isset($data)) {
            $data->status = $request->status;
            $data->keterangan = "Sudah Diterima";
            $data->save();
            return back();
        }
        return back();

    }

    public function pembayaran(){
        $menu = 'user';
        $bayar = Pembayaran::all()->where('user_id', auth()->user()->id);
        return view('homepage.listpembayaran',compact('menu','bayar'));
    }
}
