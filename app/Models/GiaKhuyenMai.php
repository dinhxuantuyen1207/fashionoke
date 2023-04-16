<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaKhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'gia_khuyen_mais';
    protected $fillable = [
        "gia",
        "khuyen_mai",
        "id_san_pham",
    ];
}
