<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskDashboard extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('livewire.task-dashboard');
    }
}
