<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The id should be made in bycrypt at the time of register and this should be unique
     */

    public function id()
    {
        $bycryptId = bin2hex(random_bytes(10));
        if (User::where('hashed_id', $bycryptId)->exists()) {
            $this->id();
        } else {
            return $bycryptId;
        }
    }

    /**
     * The boot method will be called when the user is created to store the hashed id
     */

    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->hashed_id = $user->id();
        });
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function token(){
        return $this->hasOne(loginToken::class, 'user_id');
    }
}
