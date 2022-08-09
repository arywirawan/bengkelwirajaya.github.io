<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index(){
       return view('auth.insertEmail');
    }
    public function link(Request $request){
        $data = User::all();
        $data = $data->where('email','like', $request->email);
        $details = ['email' => Crypt::encrypt($request ->email)];

        if (count($data)==0) {
            return redirect('/login')->with('sukses', 'Tautan reset password sudah terkirim');
        }
        Mail::to( $request->email )->send(new ResetMail($details));
        return redirect('/login')->with('sukses', 'Tautan reset password sudah terkirim');
    }

    public function password($email){
        return view('auth.resetPassword',['email' => $email]);
     }

     public function simpan (Request $request, $email){
        $request->validate([
            'password' => 'required|min:8',
            'konfirmasi' => 'required',

        ]);

        if ($request->password == $request->konfirmasi) {
            $email = Crypt::decrypt($email);

            $data = User::where('email','like', $email)
                        ->first(); // this point is the most important to change
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect('/login')->with('sukses', 'Password telah di perbarui');

        }
        return back()->with('gagal', 'Password tidak sesuai');
    }
}
