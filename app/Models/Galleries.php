<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Galleries extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'images'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->images);
    }

    // public function getImagePathAttribute()
    // {
    //     if ($this->image) {
    //         if (strpos($this->image, 'http') === 0) {
    //             return $this->image;
    //         }
    //         return Storage::url($this->image)  ;
    //     }

    //     return asset('images/default-image.jpg');
    // }
}
