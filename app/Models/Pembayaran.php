<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
      protected $table = 'pembayarans';
    protected $fillable = [
        'id',
        'pesanan_id',   
        'user_id',
        'bank',
        'bukti_upload',
        'status',
    ];
     public function user(){
           return $this->belongsTo(User::class);
       }
}
