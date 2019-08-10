<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
     /**
     * Get the activityScores for the activity.
     */
    public function ActivityScores()
    {
        return $this->hasMany('App\Models\ActivityMentorScore', 'activity_id');
    }
}
