<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filter_subcategory extends Model
{
    protected $fillable = [
    	'filter_id',
    	'subcategory_id'
    ];
}
