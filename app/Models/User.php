<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Profile;
use App\Models\Message;
use App\Models\Partnership;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ["id"];

    // fungsi untuk merelasikan data user dengan data profile dengan foreign key user_id
    public function profile(): HasOne
    {
        // mengembalikan nilai dari fungsi hasOne yang berisi model Profile, foreign key user_id, dan primary key id
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    // fungsi untuk merelasikan data user dengan data partnership dengan foreign key sponsor_id
    public function partnership()
    {
        // mengembalikan nilai dari fungsi hasMany yang berisi model Partnership, foreign key sponsor_id, dan primary key id
        return $this->hasMany(Partnership::class, 'sponsor_id', 'id');
    }

    // fungsi untuk merelasikan data user dengan data partnership dengan foreign key mahasiswa_id
    public function mahasiswa()
    {
        // mengembalikan nilai dari fungsi hasMany yang berisi model Partnership, foreign key mahasiswa_id, dan primary key id
        return $this->hasMany(Partnership::class, 'mahasiswa_id', 'id');
    }
    // fungsi untuk merelasikan data user dengan data partnership dengan foreign key sponsor_id
    public function sponsor()
    {
        // mengembalikan nilai dari fungsi hasMany yang berisi model Partnership, foreign key sponsor_id, dan primary key id
        return $this->hasMany(Partnership::class, 'sponsor_id', 'id');
    }
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
