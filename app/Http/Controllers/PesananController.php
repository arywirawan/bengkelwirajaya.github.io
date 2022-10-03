<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
        $pesanan = Pesanan::paginate(7);
        $no = 0;
        if (request('keyword')) {
         $pesanan = $pesanan->where('status', 'like', request('keyword'));
        }

        foreach ($pesanan as $keylist => $item) {
            $produk_id = explode(',', $pesanan[$keylist]->produk_id);
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
            $pesanan[$keylist]->listpesanan = $listpesanan;
        }
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::with('user', 'produk')->find($id);
        return response()->json($pesanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $pesanan = Pesanan::findOrFail($id);
       $produk_id = explode(',', $pesanan->produk_id);
            $panjang = explode(',', $pesanan->panjang);
            $lebar = explode(',', $pesanan->lebar);
            $kuantitas = explode(',', $pesanan->kuantitas);
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
            $pesanan->listpesanan = $listpesanan;
        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $input = $request->all();
        $pesanan->update($input);
         
        return redirect('/admin/pesanan')->with('success','Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pesanans')->where('id',$id)->delete();
  
        return redirect('/admin/pesanan')->with('success','Data pesanan berhasil dihapus!');
    }

    public function show_pesanan($id){
        $pesanan = Pesanan::find($id);
 
        return view('pesanan.updatestatus',compact('pesanan'));
    }
    
     public function update_pesanan(Request $request, $id){

        $input = $request->status;
        $pesanan = Pesanan::find($id);
        $pesanan->update(['status' => $input, ]);
        return redirect('/admin/pesanan')->with('success','Status pesanan telah diubah!');
    }

    public function generatePDF()
    {
        $pesanan = Pesanan::where('status', 'like', 'Selesai')->get();

        foreach ($pesanan as $keylist => $item) {
            $produk_id = explode(',', $pesanan[$keylist]->produk_id);
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
            $pesanan[$keylist]->listpesanan = $listpesanan;
        }
        
        $data = [
            'pesanan' => $pesanan
        ]; 
              
        $pdf = PDF::loadView('pesanan.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream();
     
    }
}
