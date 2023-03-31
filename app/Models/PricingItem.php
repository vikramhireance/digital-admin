<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;

class PricingItem extends Model
{
    use HasFactory;
    protected $table ="pricing_items";
    protected $fillable=[
        "price_id",
        "title",
        "status",
    ];

    public function prices(){
        return $this->hasMany(Price::class);
        }
}
