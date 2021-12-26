<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_num'
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
