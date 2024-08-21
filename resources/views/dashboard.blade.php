@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task Dashboard</h1>

        <!-- Include the task creation form -->
        @livewire('task-form')

        <!-- Include the task list dashboard -->
        @livewire('task-dashboard')
    </div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/app.js') }}"></script>


    <script>
        Echo.channel('tasks')
            .listen('TaskUpdated', (e) => {
                console.log('Task updated:', e.task);
                Livewire.emit('taskAdded');
            });
    </script>

@endsection
