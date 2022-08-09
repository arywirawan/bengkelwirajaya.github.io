<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = [
        'id',
        'nama_kategori',
        'deskripsi_kategori',
        'foto',
        'user_id'
    ];
//     public function user() {//user yang menginput data kategori
//         return $this->belongsTo(User::class, 'user_id');
//    }
   public function user(){
           return $this->belongsTo(User::class);
       }
}