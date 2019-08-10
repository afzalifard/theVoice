<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * Get the activities for the Candidate.
     */
    public function Activities()
    {
        return $this->hasMany('App\Models\Activity', 'condidate_id');
    }

    /**
     * Get the mentor that owns the Candidate.
     */
    public function Mentor()
    {
        return $this->belongsTo('App\Models\User', 'mentor_id');
    }
}
