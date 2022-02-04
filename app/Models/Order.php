<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'slug', 'buyer_name', 'buyer_email', 'buyer_address', 'buyer_city', 'buyer_country', 'buyer_zipcode', 'buyer_phone', 'total', 'delivery_method', 'delivery_fees'
    ];


    public function items(){
      return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
