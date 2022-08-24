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
        $detilbahan = DetilBahan::all();
        $no = 0;
        if (request('keyword')) {
            $detilbahan = $detilbahan->where('nama_kategori', 'like', '%' . request('keyword') . '%')
                ->orWhere('deskripsi_kategori', 'like', '%' . request('keyword') . '%');
        }
        $produk = Produk::all();

        foreach ($detilbahan as $keydetil => $item) {
            $bahan_id = explode(',', $detilbahan[$keydetil]->bahan_id);
            $jumlah_item = explode(',', $item->jumlah_item);
            $bahan = [];
            foreach ($bahan_id as $keybahan => $value) {
                $getbahan = Bahan::find($value);
                // falidasi data id menjadi nama
                array_push(
                    $bahan,
                    (object) [
                        'nama_bahan' => $getbahan->nama_bahan,
                        'jumlah' =>$jumlah_item[$keybahan],
                        'harga' =>$getbahan->harga
                    ]
                );
            }
            // menambahkan object baru "bahan"
            $detilbahan[$keydetil]->bahan = $bahan;
        }

        


        // $detilbahan = $detilbahan->paginate(7);
        return view('detilbahan.index', compact('detilbahan', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detilbahan = DetilBahan::latest();
        $produk = Produk::all();
        $bahan = Bahan::all();
        return view('detilbahan.create', compact('produk', 'bahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'produk_id' => 'required',
        //     'bahan_id' => 'required',
        //     'jumlah_item' => 'required',
        // ]);

        // $imageName = time().'.'.$request->logo_perusahaan->getClientOriginalName();  

        // $request->logo_perusahaan->move(public_path('images'), $imageName);

        // Perusahaan::create($request->all());

        $input = $request->all();
        $input['jumlah_item'] = implode(",", $input['jumlah_item']);
        $input['bahan_id'] = implode(",", $input['bahan_id']);


        DetilBahan::create($input);

        return redirect('/admin/detilbahan')->with('success', 'Data Detil Bahan berhasil disimpan!');
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
        $detilbahan = DetilBahan::findOrFail($id);
        $produk = Produk::all();
        $bahan = Bahan::all();
        return view('detilbahan.edit', compact('produk', 'bahan', 'detilbahan'));
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
        $detilbahan = DetilBahan::findOrFail($id);
        $input = $request->all();

        $detilbahan->produk_id = $input['produk_id'];
        $detilbahan->total_harga = $input['total_harga'];
        $detilbahan->jumlah_item = implode(",", $input['jumlah_item']);
        $detilbahan->bahan_id = implode(",", $input['bahan_id']);

        $detilbahan->save($input);
        return redirect('/admin/detilbahan')->with('success', 'Data Detil Bahan berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DetilBahan::findOrFail($id)->delete()) {
            return redirect('/admin/detilbahan')->with('success', 'Data Detil Bahan berhasil di delete!');
        }
    }
}
