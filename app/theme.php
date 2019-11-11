<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\theme_review;
class theme extends Model
{
    protected $fillable = [
    'user_id',
    'theme_name',
    'summary',
    'description',
    'category_id',
    'sub_category',
    'demo_url',
    'screenshort_url',
    'search_tag',
    'price_regular',
    'price_extented',
    'main_file',
    'main_image',
  	'status'
	];

    public function comments(){
        return $this->hasMany(ThemeComment::class, 'theme_id');
    }
}
