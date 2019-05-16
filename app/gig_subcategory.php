<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_subcategory extends Model
{
    protected $fillable = [
    	'subcategory_name',
    	'subcategory_url',
    	'category_id',
    	'status'
    ];
}
