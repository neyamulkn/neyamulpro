<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $guarded = [];

    // public function user(){
    // 	return $this->belongsTo(Users::class, 'to_user');
    // }    

    // public function userinfo(){
    // 	return $this->belongsTo(userinfo::class, 'to_user');
    // }
}
