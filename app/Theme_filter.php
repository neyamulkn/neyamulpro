<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme_filter extends Model
{
	protected $primaryKey = 'filter_id';
    protected $fillable = ['filter_name', 'category_id', 'type', 'filter_msg'];

    public $timestamps = false;
}
