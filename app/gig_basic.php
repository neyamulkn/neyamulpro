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
    protected $primaryKey = 'gig_id';

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
    public function questionAnswer(){
        return $this->hasMany(question_answer::class, 'gig_id');
    }
    public function gig_requirement(){
        return $this->hasOne(gig_requirement::class, 'gig_id');
    }

    public function get_image(){
        return $this->belongsTo(gig_image::class, 'gig_id', 'gig_id');
    }
    public function get_allImage(){
        return $this->hasMany(gig_image::class, 'gig_id', 'gig_id');
    }

     public function get_user(){
        return $this->belongsTo(user::class, 'gig_user_id', 'id');
    }

    public function get_gig_price(){
        return $this->belongsTo(gig_price::class, 'gig_id', 'gig_id');
    }

    public function gigOrder(){
        return $this->hasMany(gig_order::class, 'gig_id', 'gig_id');
    }     


    public function gig_feature(){
        return $this->hasMany(gig_feature::class, 'gig_id', 'gig_id');
    }  

    public function metadata_filters(){
        return $this->hasMany(gig_metadata_filter::class, 'gig_id', 'gig_id');
    }    

    public function gig_price(){
        return $this->belongsTo(gig_price::class, 'gig_id', 'gig_id');
    }


   
}
