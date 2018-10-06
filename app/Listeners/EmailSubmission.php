<?php

namespace App\Listeners;

use App\Events\MadeSubmission;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSubmission
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
     * @param  MadeSubmission  $event
     * @return void
     */
    public function handle(MadeSubmission $event)
    {
        //
    }
}
