<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question_answer extends Model
{
    protected $fillable = [
    	'gig_id',
    	'user_id',
    	'question',
    	'answer'
    ];
}
