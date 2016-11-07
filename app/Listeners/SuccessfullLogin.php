<?php

namespace App\Listeners;

use App\Events\UserLogged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;



class SuccessfullLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->online = true;
        $user->save();
        event(new UserLogged($user));
    }
}
