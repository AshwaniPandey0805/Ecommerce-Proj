<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignPermission extends Model
{
    use HasFactory;
    protected $table = 'assign_permissions';

    protected $fillable = [
        'role_id',
        'permission_id'
    ];


    /**
     * hasMany relation with
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'role_id','role');
    }
}
