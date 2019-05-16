<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_deliver extends Model
{

    protected $fillable = [
    	'deliver_order_id',
    	'seller_id',
    	'buyer_id',
    	'work_file',
    	'msg',
    	'status'
    ];
}
