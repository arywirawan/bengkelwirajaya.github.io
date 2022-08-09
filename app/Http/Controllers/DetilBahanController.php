<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\DetilBahan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetilBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detilbahan = DetilBahan::latest();
        $no = 0;
        if (request('keyword')) {
         $detilbahan = $detilbahan->where('nama_kategori', 'like', '%'.request('keyword').'%')
         ->orWhere('deskripsi_kategori', 'like', '%'.request('keyword').'%');
        }
        $produk = Produk::all();
        $bahan = Bahan::all();
        $detilbahan = $detilbahan->paginate(7);
        return view('detilbahan.index', compact('detilbahan', 'produk', 'bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'produk_id' => 'required',
            'bahan_id' => 'required',
            'jumlah_item' => 'required',
        ]);

        // $imageName = time().'.'.$request->logo_perusahaan->getClientOriginalName();  
     
        // $request->logo_perusahaan->move(public_path('images'), $imageName);

        // Perusahaan::create($request->all());

        $input = $request->all();
    
        DetilBahan::create($input);
         
        return redirect('/admin/detilbahan')->with('success','Data kategori berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
