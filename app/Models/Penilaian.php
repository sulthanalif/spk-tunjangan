<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    // protected $table = 'penilaian';
    protected $guarded = [];
    public function sub(){
        return $this->belongsTo(Sub::class);
    }
    public function alternative(){
        return $this->belongsTo(Alternative::class);
    }
}
