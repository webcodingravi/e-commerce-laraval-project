<?php

namespace App\Models;

use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCharge extends Model
{
    use HasFactory;

    // public function getAmountAttribute($value) {
    //     return Number::currency($value,in:'INR');
    // }
}
