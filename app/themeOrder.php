<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class themeOrder extends Model
{
    protected $fillable = [
    	'order_id',
        'theme_id',
        'lichance_name',
        'seller_id',
        'buyer_id',
        'ref_user',
        'total_price',
        'payment_method',
        'transection_id',  
    ];
}
