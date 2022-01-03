<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
      'phone',
      'email',
      'post_code',
      'city',
      'province',
      'country',
      'google_maps_url',
      'address_1',
      'address_2'
    ];
}
