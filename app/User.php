<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function followers()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'follower_id', 'user_id');
    }

    function following()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'user_id', 'follower_id');
    }

    function follow(User $user) {
        $this->following()->attach($user->id);
    }

    function unfollow(User $user) {
        $this->following()->detach($user->id);
    }
}
