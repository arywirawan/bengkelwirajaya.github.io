<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
      protected $table = 'pembayarans';
    protected $fillable = [
        
        'status',

    ];
     public function user(){
           return $this->belongsTo(User::class);
       }
}
