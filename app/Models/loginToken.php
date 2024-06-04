<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginToken extends Model
{
    use HasFactory;
    protected $table = 'login_token';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}