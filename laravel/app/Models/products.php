<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        "idproducts",
        "nameproducts",
        "priceproducts",
        "stock_quatity",
        "image",
       ];
}
