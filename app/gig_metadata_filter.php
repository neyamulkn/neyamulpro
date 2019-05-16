<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_metadata_filter extends Model
{
    protected $fillable = [
    	'gig_id',
    	'metadata_id'
    ];
}
