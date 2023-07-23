<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

 
    public function getImagePathAttribute()
    {
        if ($this->logo_image) {
            if (strpos($this->logo_image, 'http') === 0) {
                return $this->logo_image;
            }
            return asset('storage/' . $this->logo_image);
        }

        return asset('images/default-image.jpg');
    }

    public function getCoverPathAttribute()
    {
        if ($this->cover_image) {
            if (strpos($this->cover_image, 'http') === 0) {
                return $this->cover_image;
            }
            return asset('storage/' . $this->cover_image);
        }

        return asset('images/default-image.jpg');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class);
    }



}
