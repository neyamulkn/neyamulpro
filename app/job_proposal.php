<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_proposal extends Model
{
    protected $fillable = [
    	'job_id',
    	'buyer_id',
    	'freelancer_id',
    	'proposal_budget',
    	'price_type',
    	'proposal_dsc',
    	'proposal_file',
    	
    ];
}
