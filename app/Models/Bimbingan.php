<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function skripsi()
    {
        return $this->belongsTo(Skripsi::class);
    }

    public function getRouteKeyName(){
        return 'skripsi_id';
    }
}
