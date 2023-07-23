<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function gallaries()
    {
        return $this->hasMany(Galleries::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImagePathAttribute()
    {
        if ($this->image) {
            if (strpos($this->image, 'http') === 0) {
                return $this->image;
            }
            return asset('storage/' . $this->image);
            return Storage::url($this->image)  ;
        }

        return asset('images/default-image.jpg');
    }

        // permalink
    public function getPermalinkAttribute()
    {
        return route('front.products.show',$this->id ) ;
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function hasUserRated(User $user)
    {
        return $this->ratings()->where('user_id', $user->id)->exists();
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function countRatings()
    {
        return $this->ratings()->count();
    }


}
