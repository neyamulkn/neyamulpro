<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
     protected $primaryKey = 'job_id';
    protected $fillable = [
    	'job_title',
        'job_title_slug',
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

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(workplace_category::class, 'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(workplace_subcategory::class, 'subcategory_id');
    }


    public function jobOrder(){
        return $this->hasMany(job_order::class, 'job_id', 'job_id');
    }
    public function single_proposal(){
        return $this->hasOne(job_proposal::class, 'job_id', 'job_id');
    }

    public function job_proposals(){
        return $this->hasMany(job_proposal::class, 'job_id', 'job_id');
    }

}
