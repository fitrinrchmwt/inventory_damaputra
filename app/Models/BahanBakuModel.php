<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBakuModel extends Model
{
    protected $table = 'bahanbaku';
     protected $primaryKey = 'id_bahan';
     public $incrementing = false;
     public $keyType = 'string';
     public $timestamps = true;
     protected $fillable = [
          'id_bahan',
          'nama_bahan',
          'satuan',
          'stok_bahan',
          //'kedaluwarsa_bahan',
          'id_user',
          
     ];

     public function user()
     {
          return $this->belongsTo(User::class, 'id_user','id_user');
     }

     
}


