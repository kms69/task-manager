<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskCompleted;

class ProcessHighPriorityTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Mark the task as 'in-progress'
            $this->task->status = 'in-progress';
            $this->task->save();

            // Simulate task processing
            // Add your task processing logic here
            sleep(2); // Simulate time taken to process the task

            // Mark the task as 'completed'
            $this->task->status = 'completed';
            $this->task->save();


            // Log the successful completion of the task
            Log::info('Task ' . $this->task->id . ' has been processed and completed.');

        } catch (\Exception $e) {
            // Handle any errors that occur during task processing
            Log::error('Failed to process task ' . $this->task->id . ': ' . $e->getMessage());

            // Re-queue the task if necessary or handle the error accordingly
            $this->fail($e);
        }
    }
}
