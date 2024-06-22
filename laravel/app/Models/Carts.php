<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $fillable = ['product_id', 'quantity', 'user_id']; 
     // Mô hình Carts có một mối quan hệ thuộc về một User
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}

