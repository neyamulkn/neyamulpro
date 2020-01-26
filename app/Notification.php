<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class, 'entityID');
    }

    public function getGig(){
    	return $this->belongsTo(gig_order::class, 'item_id', 'gig_id');
    }
    public function gigOrder(){
    	return $this->belongsTo(gig_order::class, 'item_id', 'order_id');
    }

    public function getTheme(){
        return $this->belongsTo(theme::class, 'item_id', 'theme_id');
    }
    public function themeOrder(){
    	return $this->belongsTo(themeOrder::class, 'item_id', 'order_id');
    }

 	public function getJob(){
    	return $this->belongsTo(job::class, 'item_id', 'job_id');
    }
    public function jobOrder(){
    	return $this->belongsTo(job_order::class, 'item_id', 'order_id');
    }

    public function Withdraw(){
    	return $this->belongsTo(Withdraw::class, 'item_id', 'invoice_id');
    }


}
