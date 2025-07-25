<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
     protected $table = 'produk';
     protected $primaryKey = 'id_produk';
     public $incrementing = false;
     public $keyType = 'string';
     public $timestamps = true;
     protected $fillable = [
          'id_produk',
          'nama_produk',
          'satuan',
          'stok_produk',
          'id_user',
     ];
}
