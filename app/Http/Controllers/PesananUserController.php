<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananUserController extends Controller
{
    public function index(){
        $menu = 'user';
        return view('homepage.listpesanan',compact('menu'));
    }

    public function pembayaran(){
        $menu = 'user';
        return view('homepage.listpembayaran',compact('menu'));
    }
}
