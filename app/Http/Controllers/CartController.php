<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($id){
        $menu = 'user';
        return view ('homepage.cart', compact('menu'));
    }
}
