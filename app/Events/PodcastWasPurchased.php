<?php

namespace App\Events;

use App\Events\Event;
use App\Podcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PodcastWasPurchased extends Event
{
    use SerializesModels;

    public $podcast;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
