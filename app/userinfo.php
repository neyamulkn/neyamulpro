<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    protected $fillable = [
    	'user_id', 
    	'user_title',
    	'user_description',
    	'user_image', 
    	'user_skills',
    	'skill_level',
    	'user_tags', 
    	'user_address',
    	'user_phone',
    	'user_state',
    	'zip_code',
        'language',
        'lang_level', 
    	'user_timezone',
    	'user_additional_info', 
    	'security_quesion', 
    	'security_quesion_ans'
    ];
}
