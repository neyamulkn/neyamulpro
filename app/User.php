<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\userinfo;
use App\role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role_id', 'expert_level', 'hourly_rate', 'country', 'wallet', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userinfo(){
        return $this->hasOne(userinfo::class);
    }

    public function jobs(){
        return $this->hasMany(job::class, 'user_id');
    }

    // use proposal list page
    public function jobOrder(){
        return $this->hasMany(job_order::class, 'freelancer_id');
    }

    public function gigs(){
        return $this->hasMany(gig_basic::class, 'gig_user_id');
    }
    public function themes(){
        return $this->hasMany(theme::class, 'user_id');
    }

    public function role(){
        return $this->belongsTo(role::class);
    }

    public function follow(){
        return $this->hasOne(Following::class);
    }
}
