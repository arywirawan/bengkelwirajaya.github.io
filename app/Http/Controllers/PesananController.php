<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = Pesanan::with('user','produk')->get();
            return DataTables::of($data)
                    ->addColumn('user', function($data) {
                            return $data->user->name;
                        })
                     ->addColumn('produk', function($data) {
                            return $data->produk->nama_produk;
                        })
                    
                    ->addColumn('action', function($data){
                        //  $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>';
                        //    $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                        //    $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '"  class="btn btn-success btn-sm showDetail"><i class="fas fa-eye"></i> Show</a>';
                        $btn = $btn. '&nbsp';
                        $btn = $btn.'<a href="/admin/pesanan/'.$data->id.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>';
                        $btn = $btn.' <form action="'. route('pesanan.destroy', $data->id) .'" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                                        <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">
                                        <i class="fas fa-trash"></i> Delete</button>
                                    </form>';   
                        $btn = $btn.'<a href="/admin/pesanan/update_pesanan/'.$data->id.'" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Update Pesanan</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                     ->addIndexColumn()
                    ->make(true);
        }  
        return view('pesanan.index');
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
        //
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
            'user_id' => 'required',
            'produk_id' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tebal' => 'required',
            'kuantitas' => 'required',
            'harga_total' => 'required',
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
        //
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
}
