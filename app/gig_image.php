<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_image extends Model
{
    protected $fillable = [
    	'gig_id',
    	'user_id',
    	'image_path'
    ];
}
