<?php

namespace App;
use App\gig_home_category;
use App\gig_subcategory;
use App\filter;
use App\gig_image;
use App\gig_price;
use App\user;
use Illuminate\Database\Eloquent\Model;

class gig_basic extends Model
{
    protected $fillable = [
    	'gig_title',
        'gig_url',
    	'gig_dsc',
    	'category_name',
    	'gig_subcategory',
        'gig_metadata',
    	'gig_payment_type',
    	'gig_search_tag',
    	'gig_user_id',
    	'gig_status'
    ];

    public function get_category(){
        return $this->belongsTo(gig_home_category::class, 'category_name');
    }

    public function get_subcategory(){
        return $this->belongsTo(gig_subcategory::class, 'gig_subcategory');
    }

     public function get_image(){
        return $this->belongsTo(gig_image::class, 'gig_id', 'gig_id');
    }

     public function get_user(){
        return $this->belongsTo(user::class, 'gig_user_id', 'id');
    }

    public function get_gig_price(){
        return $this->belongsTo(gig_price::class, 'gig_id', 'gig_id');
    }
   
}
