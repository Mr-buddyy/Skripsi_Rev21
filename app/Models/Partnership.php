<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partnership extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
    ];

    // fungsi untuk merelasikan data partnership dengan data user dengan foreign key mahasiswa_id 
    public function mahasiswa()
    {
        // mengembalikan nilai dari fungsi belongsTo yang berisi model User, foreign key mahasiswa_id, dan primary key id
        return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }
    // fungsi untuk merelasikan data partnership dengan data user dengan foreign key sponsor_id
    public function sponsor()
    {
        // mengembalikan nilai dari fungsi belongsTo yang berisi model User, foreign key sponsor_id, dan primary key id
        return $this->belongsTo(User::class, 'sponsor_id', 'id');
    }
    // fungsi untuk merelasikan data partnership dengan data profile dengan foreign key mahasiswa_id
    public function user()
    {
        // mengembalikan nilai dari fungsi belongsTo yang berisi model User, foreign key mahasiswa_id, dan primary key id
        return $this->belongsTo(User::class, 'sponsor_id', 'id');
    }
    // fungsi untuk merelasikan data partnership dengan data profile dengan foreign key mahasiswa_id
    public function profile(): BelongsTo
    {
        // mengembalikan nilai dari fungsi belongsTo yang berisi model Profile, foreign key mahasiswa_id, dan primary key id
        return $this->belongsTo(Profile::class, 'mahasiswa_id', 'id');
    }
}
