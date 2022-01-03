<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'discount',
        'slug',
        'stock'
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function images()
    {
      return $this->hasMany(Image::class);
    }

    public function promotions()
    {
      return $this->hasOne(Promotion::class);
    }

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }

    public function statistics()
    {
      return $this->hasMany(Statistic::class);
    }
}
