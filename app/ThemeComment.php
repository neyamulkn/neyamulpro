<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeComment extends Model
{
    protected $guarded = [];


    public function theme(){
    	return $this->belongsTo(theme::class, 'theme_id');
    }

    public function comment_reply(){
    	return $this->hasMany(comment_reply::class, 'com_id');
    }
}
