<?php

namespace App\Events;

use Carbon\Carbon;
use App\Models\JobApplication;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class JobApplicationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     public $jobApplication;

     public $id;
     public $taisei_interview;

     public function __construct(JobApplication $jobApplication)
     {
         $this->id = $jobApplication->id;
         $this->taisei_interview = $jobApplication->taisei_interview
             ? Carbon::parse($jobApplication->taisei_interview)->format('Y-m-d')
             : null;
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
            'id' => $this->id,
            'taisei_interview' => $this->taisei_interview
        ];
    }
}
