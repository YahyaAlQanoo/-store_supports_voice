<?php

namespace App\View\Components;

use App\Models\Wishlist as ModelsWishlist;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
 
class Wishlists extends Component
{
    public $wishlists;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->wishlists = ModelsWishlist::where('user_id','=', Auth::id())->count();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wishlists');
    }
}
