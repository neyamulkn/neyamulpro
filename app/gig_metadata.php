<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_metadata extends Model
{
    protected $fillable = [
    	'sub_filter_name',
    	'filter_id',
    	'filter_type'
    ];
}
