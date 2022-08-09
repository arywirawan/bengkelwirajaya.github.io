<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;




class UserController extends Controller
{
    public function index(Request $request) {
        $data = array('title' => 'Setting Profil');
        return view('user.index', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('user.setting', $data);
    }
}
