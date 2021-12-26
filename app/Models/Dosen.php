<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
        'user_id',
        'nip'
        
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Aktifkan ini untuk 2 dosen pembimbing
    // public function topik()
    // {
    //     return $this->belongsToMany(Topik::class,'dosen_topiks');
    // }

    public function topik()
    {
        return $this->hasMany(Topik::class);
    }
    
}
