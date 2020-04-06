<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_requirement extends Model
{
	protected $primaryKey = 'requirement_id';
    protected $fillable = [
    	'gig_id',
    	'requirement'
    ];
}
