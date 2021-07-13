<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Http\Request;
use App\Models\LoginHistory;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        // dd($event->request->ip());
        // dd($event->user);
        
        LoginHistory::create([
            'ip' =>  $event->request->ip(),
            'user_id' => $event->user->id
        ]);
    }
}
