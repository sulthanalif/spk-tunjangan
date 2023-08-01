<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'absensi',
        'masa_kerja',
        'sikap',
        'performa_kerja',
        'kedisiplinan',
    ];
}
