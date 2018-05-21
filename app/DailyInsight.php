<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyInsight extends Model
{
     protected $fillable = [
        'user_id', 'graph_instagram_id','reach', 'impressions', 'profile_views', 'end_time',
    ];
}
