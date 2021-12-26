<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nrp'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topik()
    {
        return $this->hasMany(Topik::class);
    }
}
