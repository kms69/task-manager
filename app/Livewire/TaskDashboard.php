<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskDashboard extends Component
{
    public $tasks;

    protected $listeners = ['taskAdded' => 'refreshTasks'];

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function refreshTasks()
    {
        $this->tasks = Task::all();
    }

    public function markAsComplete($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->status = 'completed';
            $task->save();
            $this->dispatch('taskAdded');
            $this->refreshTasks();
        }
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
            $this->dispatch('taskAdded');
            $this->refreshTasks();
        }
    }

    public function editTask($taskId)
    {
        $this->selectedTask = Task::find($taskId);
        $this->dispatch('taskSelected', $this->selectedTask);
    }

    public function render()
    {
        return view('livewire.task-dashboard');
    }
}
