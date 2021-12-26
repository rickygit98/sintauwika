<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function topik()
    {
        return $this->hasMany(Topik::class);
    }
}
