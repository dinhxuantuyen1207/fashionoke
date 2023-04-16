<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeSanPham extends Model
{
    use HasFactory;
    protected $table = 'size_san_phams';
    protected $fillable = [
        'size',
        'id_san_pham'
    ];
}
