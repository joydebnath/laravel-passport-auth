<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Passport\Passport;

class RevokeOldTokens
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
    public function handle($event)
    {
        Passport::token()
            ->where(function ($query) use ($event) {
                $query
                    ->where('user_id', $event->userId)
                    ->where('client_id', $event->clientId);
            })
            ->where('id', '<>', $event->tokenId)
            ->update([
                'revoked' => true
            ]);
    }
}
