<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_requirement_ans extends Model
{
    protected $fillable =[
     'gig_id',
     'order_id',
     'requirement_ans',
     'attach_file',
     'buyer_id'
 	];
}
