<?php

namespace App\Events;

use App\Models\JobApplication;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class JobApplicationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     public $jobApplication;


     public function __construct(JobApplication $jobApplication)
     {
         $this->jobApplication = $jobApplication;
     }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('job-applications');
    }

    public function broadcastWith()
    {
        return [
            'id'=>$this->jobApplication->id,
            'taisei_interview'=>$this->jobApplication->taisei_interview
                        ? \Carbon\Carbon::parse($this->jobApplication->taisei_interview)->format('Y-m-d')
                        : null
        ];
    }
}
