<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id', 'user_id', 'product_id', 'quantity', 'cookie_id'
    ];



    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
