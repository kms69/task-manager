<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" wire:model="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" class="form-control" wire:model="due_date">
            @error('due_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" class="form-control" wire:model="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            @error('priority') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control" wire:model="status">
                <option value="pending">Pending</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
