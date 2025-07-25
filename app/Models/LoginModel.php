<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    public $incrementing = false;
    public $timestamps = false; // karena tabel login tidak punya created_at, updated_at
    protected $keyType = 'string';

    // Laravel secara default butuh primary key, tapi kita bisa matikan validasi ini
    protected $primaryKey = null; // Tabel ini tidak punya primary key

    protected $fillable = [
        'id_user',
        'username',
        'tanggal_login',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
