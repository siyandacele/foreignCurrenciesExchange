<?php

namespace CurrencyPurchase\Rate;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Discount extends Eloquent
{
    protected $table = 'discount';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'action',
        'total_amount_discount',
    ];

}