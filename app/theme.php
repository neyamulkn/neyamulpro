<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\theme_review;
class theme extends Model
{
    protected $primaryKey = 'theme_id';
    protected $fillable = [
    'user_id',
    'theme_name',
    'theme_url',
    'summary',
    'description',
    'category_id',
    'sub_category',
    'child_category',
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
    
    public function orders(){
        return $this->hasMany(themeOrder::class, 'theme_id', 'theme_id');
    }

    public function theme_review(){
        return $this->hasMany(theme_review::class, 'theme_id', 'theme_id');
    }
}
