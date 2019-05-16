<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_to_cart extends Model
{
    protected $fillable =[
    	'gig_id',
    	'gig_user_id',
    	'package_name',
    	'user_id'
    ];
}
