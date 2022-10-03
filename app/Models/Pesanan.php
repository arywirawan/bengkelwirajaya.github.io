<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = [
        'id',
        'user_id',
        'produk_id',
        'panjang',
        'lebar',
        'tebal',
        'kuantitas',
        'harga_total',
        'status',
        'keterangan',
        'created_at',
        'updated_at'

    ];
    
   public function user(){
           return $this->belongsTo(User::class);
       }

    public function produk(){
           return $this->belongsTo(Produk::class);
       }
    
}   
