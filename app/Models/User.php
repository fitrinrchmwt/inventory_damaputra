<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'id_user', 'email', 'username', 'password',  'level_user','created_at','updated_at',
    ];

    protected $hidden = ['password'];
    
}
