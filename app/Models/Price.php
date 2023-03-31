<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table ="prices";
    protected $fillable=[
        "title",
        "price",
    ];
    public function pricingItems(){
        return  $this->belongsTo(PricingItem::class,'price_id');
       }

}
