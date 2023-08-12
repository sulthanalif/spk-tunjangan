<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    // protected $table = 'alternative';
    protected $guarded = [];


    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }
}
