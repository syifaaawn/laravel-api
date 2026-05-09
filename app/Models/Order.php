<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
        'shipping_address'
    ];   

    public function user()
    {
        return $this->belongsTo(UserApi::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
