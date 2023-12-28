<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Partnership;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    // fungsi untuk merelasikan data profile dengan data user dengan foreign key user_id
    public function user()
    {
        // mengembalikan nilai dari fungsi belongsTo yang berisi model User, foreign key user_id, dan primary key id
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // fungsi untuk merelasikan data profile dengan data partnership dengan foreign key mahasiswa_id
    public function partnership(): HasOne
    {
        // mengembalikan nilai dari fungsi hasOne yang berisi model Partnership, foreign key mahasiswa_id, dan primary key id
        return $this->hasOne(Partnership::class, 'mahasiswa_id', 'id');
    }
}
