<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filter_subcategory extends Model
{
    protected $fillable = [
    	'filter_id',
    	'subcategory_id'
    ];

    public function filters(){
    	return $this->belongsTo(filter::class, 'filter_id', 'filter_id');
    }

    public function metadata(){
    	return $this->hasMany(gig_metadata::class, 'filter_id', 'filter_id')->where('filter_type', 'No');
    }

     public function gig_feature(){
        return $this->hasOne(gig_feature::class, 'feature_id', 'sub_filter_id');
    } 
 
}
