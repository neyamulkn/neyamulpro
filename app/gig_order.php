<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_order extends Model
{
    protected $fillable = [
        'order_id',
    	'gig_id',
        'ref_user',
        'package_name',
        'quantity',
        'subtotal',
        'total',
        'seller_id',
        'buyer_id',
        'payment_method',
        'transection_id',
        'delivery_time',
        'status'
    ];

    public function getGig(){
        return $this->belongsTo(gig_basic::class, 'gig_id', 'gig_id');
    }
}
