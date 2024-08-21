<?php

namespace App\Livewire;

use App\Jobs\ProcessHighPriorityTask;
use App\Models\Task;
use Livewire\Component;

class TaskForm extends Component
{
    public $title;
    public $description;
    public $due_date;
    public $priority = 'medium';
    public $status = 'pending';
    public $taskId;

    protected $listeners = ['taskSelected' => 'loadTask'];

    public function loadTask(Task $task)
    {
        $this->taskId = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date->format('Y-m-d');
        $this->priority = $task->priority;
        $this->status = $task->status;
    }


    public function submit()
    {
        // Validate the input fields
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        // Create a new task
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'priority' => $this->priority,
            'status' => $this->status,
        ]);

        // Dispatch an event and reset the form fields
        $this->dispatch('taskAdded');
        $this->resetForm(); // Reset the form fields to prepare for the next task
    }

    public function resetForm()
    {
        $this->taskId = null;
        $this->title = '';
        $this->description = '';
        $this->due_date = '';
        $this->priority = 'medium';
        $this->status = 'pending';
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
