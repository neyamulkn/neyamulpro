<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_count extends Model
{
    protected $fillable = [
    	'ref_username',
    	'total_view',
    	'total_item',
    	'ref_earning'
    ];
}
