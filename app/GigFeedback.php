<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GigFeedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';

    protected $guarded = [];
}
