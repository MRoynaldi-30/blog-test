<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan ini, bukan extends interface
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'account'; // Nama tabel
    protected $primaryKey = 'username'; // Primary key
    public $incrementing = false; // Non-incremental primary key
    protected $keyType = 'string'; // Tipe primary key string

    protected $fillable = [
        'username', 'password', 'name', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'username', 'username');
    }
}
