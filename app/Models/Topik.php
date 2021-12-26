<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $table = 'topiks';
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function skripsi()
    {
        return $this->hasOne(Skripsi::class);
    }

    //if want N to N to user
    // public function user()
    // {
    //     return $this->belongsToMany(User::class,'users_topiks');
    // }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Aktifkan ini jika mau 2 dosen pembimbing
    // public function dosen()
    // {
    //     return $this->belongsToMany(Dosen::class,'dosen_topiks');
    // }


    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
