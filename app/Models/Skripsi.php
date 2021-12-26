<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function topik()
    {
        return $this->belongsTo(Topik::class);
    }
    
     public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
