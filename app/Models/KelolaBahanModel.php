<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelolaBahanModel extends Model
{
     protected $table = 'mengelola_bahan';
     protected $primaryKey = 'id_kelola_bb';
     public $incrementing = false;
     public $keyType = 'string';
     public $timestamps = true;
     protected $fillable = [
          'id_kelola_bb',
          'id_bahan',
          'jenis_pencatatan',
          'id_bahan',
          'jumlah_bahan',
          'keterangan',
          'kedaluwarsa_bahan_kelola',
          'id_user',

     ];

     public function bahanbaku()
     {
          return $this->belongsTo(BahanBakuModel::class, 'id_bahan');
     }

}
