<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = Kategori::latest();
        $no = 0;
        if (request('keyword')) {
         $kategori = $kategori->where('nama_kategori', 'like', '%'.request('keyword').'%')
         ->orWhere('deskripsi_kategori', 'like', '%'.request('keyword').'%');
        }
        $kategori = $kategori->paginate(7);
        return view('kategori.index', compact('kategori', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $user = User::all();
        return view('kategori.create', compact('user'));
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
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required',
        ]);

        // $imageName = time().'.'.$request->logo_perusahaan->getClientOriginalName();  
     
        // $request->logo_perusahaan->move(public_path('images'), $imageName);

        // Perusahaan::create($request->all());

        $input = $request->all();
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'gambar/';
            $gambarKategori = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gambarKategori);
            $input['foto'] = "$gambarKategori";
        }
    
        Kategori::create($input);
         
        return redirect('/admin/kategori')->with('success','Data kategori berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //  $kategori = Kategori::find($id);
        // return view('kategori.index',compact('kategori'));
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $kategori = Kategori::findOrFail($id);
        $user = User::all();
        return view('kategori.edit', compact('kategori','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required',
        ]);
        $input = $request->all();

         if ($image = $request->file('foto')) {
            $destinationPath = 'gambar/';
            $gambarKategori = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gambarKategori);
            $input['foto'] = "$gambarKategori";
        }
        $kategori->update($input);
        return redirect('/admin/kategori')->with('success','Data kategori berhasil disimpan!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('kategoris')->where('id',$id)->delete();
  
        return redirect('/admin/kategori')->with('success','Data kategori berhasil dihapus!');
    }
}
