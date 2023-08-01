<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'status',
        'tipe',
        'bobot',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function sub()
    {
        return $this->hasMany(Sub::class);
    }
}
