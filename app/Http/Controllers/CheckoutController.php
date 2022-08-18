<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $menu = 'user';
        return view ('homepage.checkout', compact('menu'));
    }
}
