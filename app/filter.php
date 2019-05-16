<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filter extends Model
{
    protected $fillable = [
    	'filter_name',
    	'sub_category_id',
    	'mete_tag',
    	'filter_msg'
    ];
}
