<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAdmin extends Model
{
    use HasFactory;
    protected $table = 'sub_admins';
    protected $fillable = [
        'id_admin',
        'id_chuc_vu',
        'ngay_vao_lam',
        'hinh_anh',
        'ngay_sinh',
        'gioi_tinh',
        'luong',
    ];
}
