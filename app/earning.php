<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class earning extends Model
{
    protected $fillable = [

    	'seller_id',
        'buyer_id',
        'item_id',
        'price',
        'earning',
        'type',
        'ref_username',
        'ref_earning',
        'status'
    ];
}
