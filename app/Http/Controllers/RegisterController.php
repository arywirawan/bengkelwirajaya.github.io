<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller {
   
    public function index()
    {
        return view('auth.register');
    }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'notelp' => 'required|min:10',
            'alamat' => 'required',
            
        ]);

        if($request->password == $request->konfirmasi){

            if ($request->file('image')) {
            $gambar = $request->file('image')->store('profile-images');
        
           
        }
         else {
                $gambar = 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png';
            }

        $hasil = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'image' => $gambar
             ]);

        if ($hasil == '1') {
            return redirect('/login')->with('gagal', 'Gagal menyimpan data');
        } else {
            return redirect('/login')->with('sukses', 'Berhasil menyimpan data');
        }

        }
        return redirect('/register')->with('msg', 'Password tidak sesuai!');
    }
}