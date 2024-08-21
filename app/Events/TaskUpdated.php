<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Task $task
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tasks'); // Public channel named 'tasks'
    }

    /**
     * Additional data to broadcast with the event.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['task' => $this->task];
    }
}
