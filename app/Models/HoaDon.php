<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoa_dons';
    protected $fillable = [
        'id_nguoi_nhan',
        'id_san_pham',
        'nguoi_nhan',
        'so_dien_thoai',
        'dia_chi',
        'tinh_trang_don_hang',
        'tinh_trang_thanh_toan',
        'tong_tien',
        'so_luong'
    ];
}
