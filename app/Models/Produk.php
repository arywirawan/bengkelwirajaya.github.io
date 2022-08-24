<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   protected $table = 'produks';
    protected $fillable = [
        'id',
        'nama_produk',
        'foto_produk',
        'harga_jasa',
        'deskripsi'
    ];
    
     public function pesanan()
        {
            return $this->hasMany(Pesanan::class);
        }
    
      public function detilbahan()
        {
            return $this->hasMany(DetilBahan::class);
        }

}
