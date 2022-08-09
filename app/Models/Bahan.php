<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahans';
    protected $fillable = [
        'id',
        'nama_bahan',
        'ukuran',
        'harga',
        'stok',
        'user_id'
    ];

    public function user(){
           return $this->belongsTo(User::class);
       }

    public function detilbahan()
        {
            return $this->hasMany(DetilBahan::class);
        }
}
