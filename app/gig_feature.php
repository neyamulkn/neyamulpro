<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_feature extends Model
{
	protected $fillable = [
	    'gig_id',
	    'user_id',
	    'feature_id',
	    'feature_name',
	    'feature_basic',
	    'feature_plus',
	    'feature_super',
	    'feature_platinum'
	];
 
}
