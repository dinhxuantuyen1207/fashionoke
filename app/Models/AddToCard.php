<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCard extends Model
{
    use HasFactory;
    protected $table = 'add_to_cards';
    protected $fillable = [
        'id_san_pham',
        'id_user',
    ];
}
