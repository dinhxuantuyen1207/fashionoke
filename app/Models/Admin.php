<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'email',
        'phone',
        'password',
        'full_name',
        'is_master',
        'group_rule'
    ];

    public function sub_admin(){
        return $this->hasOne('\App\Models\SubAdmin','id_admin','id');
    }

    public function sub_admin2()
    {
        return $this->hasOne(SubAdmin::class);
    }
}
