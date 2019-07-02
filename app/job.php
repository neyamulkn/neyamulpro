<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $fillable = [

    	'post_title',
        'post_title_slug',
        'user_id',
        'category_id',
        'subcategory_id',
        'job_dsc',
        'project_type',
        'number_freelancer',
        'experience',
        'price_type',
        'budget',
        'status'
    ];
}
