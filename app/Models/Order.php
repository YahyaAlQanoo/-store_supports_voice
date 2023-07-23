<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tax', 'discount', 'total',
        'billing_firstname',
        'billing_lastname',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_postalcode',
        'billing_country',
        'shipping_firstname',
        'shipping_lastname',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_city',
        'shipping_postalcode',
        'shipping_country',
    ];

    protected static function booted()
    {
        static::creating(function(Order $order) {
            $now = Carbon::now();
            $max = Order::whereYear('created_at', $now->year)->max('number');
            if (!$max) {
                $max = $now->year . '00000';
            }
            $order->number = $max + 1;
            
            $order->shipping_firstname = $order->shipping_firstname ?: $order->billing_firstname;
            $order->shipping_lastname = $order->shipping_lastname ?: $order->billing_lastname;
            $order->shipping_email = $order->shipping_email ?: $order->billing_email;
            $order->shipping_phone = $order->shipping_phone ?: $order->billing_phone;
            $order->shipping_address = $order->shipping_address ?: $order->billing_address;
            $order->shipping_city = $order->shipping_city ?: $order->billing_city;
            $order->shipping_postalcode = $order->shipping_postalcode ?: $order->billing_postalcode;
            $order->shipping_country = $order->shipping_country ?: $order->billing_country;
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


}
