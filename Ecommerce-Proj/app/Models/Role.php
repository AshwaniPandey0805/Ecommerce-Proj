<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'role_id',
        'role_name'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'role', 'role_id');
    }
}
