<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_order extends Model
{
    protected $fillable = [

    	'order_id',
        'job_id',
        'proposal_id',
        'wor_description',
        'freelancer_id',
        'buyer_id',
        'proposal_budget',
        'payment_method',
        'transection_id',
        'status'
    ];
}
