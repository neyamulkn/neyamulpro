<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme_filter_category extends Model
{
    protected $guarded = [];

    public function filter(){
    	return $this->belongsTo(Theme_filter::class, 'filter_id', 'filter_id');
    }
}
