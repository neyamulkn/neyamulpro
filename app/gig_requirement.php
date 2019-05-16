<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_requirement extends Model
{
    protected $fillable = [
    	'gig_id',
    	'requirement'
    ];
}
