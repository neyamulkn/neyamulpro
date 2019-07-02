<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theme_review extends Model
{
    protected $fillable = [

    	'theme_id',
        'buyer_id',
        'ratting_reason',
        'ratting_star',
        'ratting_comment'
    ];
}
