<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::latest();
        $no = 0;
        if (request('keyword')) {
         $produk = $produk->where('nama_produk', 'like', '%'.request('keyword').'%')
         ->orWhere('deskripsi', 'like', '%'.request('keyword').'%');
        }
        $produk = $produk->paginate(7);
        return view('produk.index', compact('produk', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Produk Baru');
        return view('produk.create', $data);
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
            'nama_produk' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_jasa' => 'required',
            'deskripsi' => 'required',
            
        ]);

        // $imageName = time().'.'.$request->logo_perusahaan->getClientOriginalName();  
     
        // $request->logo_perusahaan->move(public_path('images'), $imageName);

        // Perusahaan::create($request->all());

        $input = $request->all();
  
        if ($image = $request->file('foto_produk')) {
            $destinationPath = 'gambar/';
            $gambarProduk = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gambarProduk);
            $input['foto_produk'] = "$gambarProduk";
        }
    
        Produk::create($input);
         
        return redirect('/admin/produk')->with('success','Data produk berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array('title' => 'Foto Produk');
        return view('produk.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
         $request->validate([
            'nama_produk' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_jasa' => 'required',
            'deskripsi' => 'required',
    
        ]);
        $input = $request->all();

         if ($image = $request->file('foto_produk')) {
            $destinationPath = 'gambar/';
            $gambarProduk = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gambarProduk);
            $input['foto_produk'] = "$gambarProduk";
        }
        $produk->update($input);
        return redirect('/admin/produk')->with('success','Data produk berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produks')->where('id',$id)->delete();
  
        return redirect('/admin/produk')->with('success','Data produk berhasil dihapus!');
    }
}
