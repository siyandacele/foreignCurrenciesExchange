<?php

namespace CurrencyPurchase\Rate;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Orders extends Eloquent
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'oparation',
        'currency',
        'rate',
        'surcharge',
        'amount',
        'calculated_amount',
        'surcharge_amount',
        'total_surcharged_amount',
        'final_amount',
        
    ];

}