<div class="flex justify-center">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
    <input type="text" wire:model="task" wire:keydown.enter="addTodo" placeholder="Add a new task">
    @forelse($todos as $todo)
        <div>
            <input type="checkbox" wire:change="toggleTodo({{ $todo->id, $todo->status }})" {{ $todo->done ? 'checked' : '' }}>
            <span>{{ $todo->task }}</span>
            <button wire:click="deleteTodo({{ $todo->id }})">Delete</button>
        </div>
    @empty
        <p>No tasks yet</p>
    @endforelse
    </div>
</div>
