<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_proposal extends Model
{
    protected $primaryKey = 'proposal_id';
    protected $fillable = [
    	'job_id',
    	'buyer_id',
    	'freelancer_id',
    	'proposal_budget',
    	'work_duration',
    	'proposal_dsc',
    	'proposal_file',
    	
    ];


    public function user(){
        return $this->belongsTo(User::class, 'freelancer_id');
    }
}
