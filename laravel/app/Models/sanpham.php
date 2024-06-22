<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;

    protected $fillable = [
        'maloaisp',
        'tensp',
        'anhsp',
        'giasp',
        'soluongsp',
        'motasp',
        'stock'
    ];
    
}
