<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamHoaDon extends Model
{
    use HasFactory;
    protected $table = 'san_pham_hoa_dons';
    protected $fillable = [
        'id_hoa_don',
        'so_luong',
        'size',
        'id_san_pham',
    ];
}
