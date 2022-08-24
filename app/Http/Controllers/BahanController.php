<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bahan = Bahan::latest();
        $no = 0;
        if (request('keyword')) {
         $bahan = $bahan->where('nama_bahan', 'like', '%'.request('keyword').'%')
         ->orWhere('ukuran', 'like', '%'.request('keyword').'%');
        }
        $bahan = $bahan->paginate(7);
        return view('bahan.index', compact('bahan', 'no'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('bahan.create', compact('user'));
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
            'nama_bahan' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'user_id' => 'required',
        ]);
        $input = $request->all();
        Bahan::create($input);
         
        return redirect('/admin/bahan')->with('success','Data bahan baku berhasil disimpan!');

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
        $bahan = Bahan::findOrFail($id);
        $user = User::all();
        return view('bahan.edit', compact('bahan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahan $bahan)
    {
         $request->validate([
            'nama_bahan' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'user_id' => 'required',
        ]);
        $input = $request->all();
       $bahan->update($input);
         
        return redirect('/admin/bahan')->with('success','Data bahan baku berhasil disimpan!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('bahans')->where('id',$id)->delete();
  
        return redirect('/admin/bahan')->with('success','Data bahan baku berhasil dihapus!');
    }
}
