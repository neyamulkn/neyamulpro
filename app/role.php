<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
     protected $fillable = [
   		'role_name',
   		'role_slug'
   ];

   public function users(){
   		$this->hasMany(User::class); 
   }
}
