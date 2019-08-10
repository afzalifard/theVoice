<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use Notifiable, HasApiTokens;

    /**
     * Get the Candidates for the mentor user.
     */
    public function Candidates()
    {
        return $this->hasMany('App\Models\Candidate', 'mentor_id');
    }

    /**
     * Scope a query to filter users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query , $name)
    {
        return $query->where('name','like', '%'.$name.'%');
    }
}
