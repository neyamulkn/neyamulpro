<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gig_price extends Model
{
	protected $fillable = [
		'gig_id',
		'catetory_id',
	   'basic_title',
	   'plus_title',
	   'super_title',
	   'platinum_title',
	   'basic_dsc',
	   'plus_dsc',
	   'super_dsc',
	   'platinum_dsc',
	   'delivery_time_b',
	   'delivery_time_p',
	   'delivery_time_s',
	   'delivery_time_pm',
	   'rivision_b',
	   'rivision_p',
	   'rivision_s',
	   'rivision_pm',
	   'daily_work_b',
	   'daily_work_p',
	   'daily_work_s',
	   'daily_work_pm',
	   'basic_p',
	   'plus_p',
	   'super_p',
	   'platinum_p',
	   'user_id'
   ];

   public $timestamps = false;
}
