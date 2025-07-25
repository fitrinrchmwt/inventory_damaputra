<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelolaProdukModel extends Model
{
     protected $table = 'mengelola_produk';
     protected $primaryKey = 'id_kelola_pr';
     public $incrementing = false;
     public $keyType = 'string';
     public $timestamps = true;
     protected $fillable = [
          'id_kelola_pr',
          'id_produk',
          'jenis_pencatatan',
          'id_produk',
          'jumlah_produk',
          'keterangan',
          'kedaluwarsa_produk_kelola',
          'id_user',

     ];

     public function user()
     {
          return $this->belongsTo(User::class, 'id_user', 'id_user');
     }

     public function produk()
     {
          return $this->belongsTo(ProdukModel::class, 'id_produk');
     }


}
