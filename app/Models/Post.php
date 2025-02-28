<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'idpost';
    protected $fillable = ['title', 'content', 'date', 'username'];
    public $timestamps = true;

    public function account()
    {
        return $this->belongsTo(Account::class, 'username', 'username');
    }
}
