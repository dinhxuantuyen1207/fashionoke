<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaiKhoanNguoiDung extends Authenticatable
{
    use HasFactory;
    protected $table = 'tai_khoan_nguoi_dungs';
    protected $fillable = [
        'email',
        'phone',
        'password',
        'full_name',
    ];
}
