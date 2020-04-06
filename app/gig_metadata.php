<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_metadata extends Model
{
	protected $primaryKey = 'sub_filter_id';
	
    protected $fillable = [
    	'sub_filter_name',
    	'filter_id',
    	'filter_type'
    ];

    public function gig_feature(){
        return $this->hasOne(gig_feature::class, 'feature_id', 'sub_filter_id');
    } 
}
