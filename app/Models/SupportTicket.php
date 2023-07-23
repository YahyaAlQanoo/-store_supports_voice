<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $fillable = [
        'customer_id',
        'title',
        'description',
        'status',
        'priority',
    ];
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(SupportTicketMessage::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
 
}
