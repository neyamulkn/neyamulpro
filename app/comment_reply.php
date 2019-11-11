<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment_reply extends Model
{
    protected $guarded = [];

    public function comment_reply(){
    	return $this->hasMany(ThemeComment::class, 'com_id');
    }

}
