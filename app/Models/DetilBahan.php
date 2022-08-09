<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilBahan extends Model
{
   protected $table = 'pesanans';
    protected $fillable = [
        'id',
        'produk_id',
        'bahan_id',
        'jumlah_item',
        'biaya_bahan'

    ];

     public function bahan(){
           return $this->belongsTo(Bahan::class);
       }

    public function produk(){
           return $this->belongsTo(Produk::class);
       }
}
