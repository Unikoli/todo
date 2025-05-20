@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Todo List</h2>
        <a href="{{ route('todos.create') }}" class="btn btn-primary">Add New Todo</a>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="btn-group" role="group">
                <a href="{{ route('todos.index', ['filter' => 'all']) }}" 
                   class="btn btn-outline-secondary {{ $filter === 'all' ? 'active' : '' }}">
                    All
                </a>
                <a href="{{ route('todos.index', ['filter' => 'active']) }}" 
                   class="btn btn-outline-secondary {{ $filter === 'active' ? 'active' : '' }}">
                    Active
                </a>
                <a href="{{ route('todos.index', ['filter' => 'completed']) }}" 
                   class="btn btn-outline-secondary {{ $filter === 'completed' ? 'active' : '' }}">
                    Completed
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($todos->count() > 0)
                <ul class="list-group">
                    @foreach ($todos as $todo)
                        <li class="list-group-item todo-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm me-2" title="{{ $todo->is_completed ? 'Mark as incomplete' : 'Mark as complete' }}">
                                        @if ($todo->is_completed)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <div>
                                    <span class="{{ $todo->is_completed ? 'completed' : '' }}">{{ $todo->title }}</span>
                                    @if ($todo->description)
                                        <p class="mb-0 text-muted small">{{ $todo->description }}</p>
                                    @endif
                                    @if ($todo->due_date)
                                        <div class="due-date {{ $todo->due_date->isPast() && !$todo->is_completed ? 'overdue' : '' }}">
                                            Due: {{ $todo->due_date->format('M d, Y') }}
                                            @if ($todo->due_date->isPast() && !$todo->is_completed)
                                                (Overdue)
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this todo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center my-3">No todos found. Create one to get started!</p>
            @endif
        </div>
    </div>
@endsection
