<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputan['name'] = 'Admin 1';
        $inputan['email'] = 'admin@admin.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('admin123');//passwordnya 123258
        $inputan['level'] = 'admin';
        $inputan['notelp'] = '0895410933236';
        $inputan['alamat'] = 'Jl. Umalas II No. 36B, Kerobokan Kelod, Kuta Utara, Badung';
        $inputan['image'] = 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png';
        User::create($inputan);
    }
}
