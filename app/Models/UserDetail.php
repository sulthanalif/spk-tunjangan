<?php

namespace App\Models;

use App\DataTables\UsersDataTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone_number',
        'jabatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
