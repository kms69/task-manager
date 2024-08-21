<div class="container my-4">
    <h1 class="mb-4">Task Dashboard</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>
                            <span class="badge
                                @if($task->status == 'completed') bg-success
                                @elseif($task->status == 'in-progress') bg-warning
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($task->status) }}
                            </span>
                    </td>
                    <td>
                            <span class="badge
                                @if($task->priority == 'high') bg-danger
                                @elseif($task->priority == 'medium') bg-warning
                                @else bg-info
                                @endif">
                                {{ ucfirst($task->priority) }}
                            </span>
                    </td>
                    <td>{{ $task->updated_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <!-- Action Buttons -->
                        <button class="btn btn-sm btn-success" wire:click="editTask({{ $task->id }})">Update</button>
                        <button class="btn btn-sm btn-primary" wire:click="markAsComplete({{ $task->id }})">Complete
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="deleteTask({{ $task->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
