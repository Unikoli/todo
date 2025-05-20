<?php

namespace App\Http\Controllers;

use App\Actions\Todos\CreateTodoAction;
use App\Actions\Todos\DeleteTodoAction;
use App\Actions\Todos\ListTodosAction;
use App\Actions\Todos\ToggleTodoCompletionAction;
use App\Actions\Todos\UpdateTodoAction;
use App\DataTransferObjects\TodoData;
use App\Http\Requests\TodoRequest;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index(Request $request, ListTodosAction $listTodosAction)
    {
        $filter = $request->query('filter', 'all');
        $todos = $listTodosAction->execute($filter);
        // Add this to a controller method temporarily
// dd(session('todos'));
        
        return view('todos.index', compact('todos', 'filter'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request, CreateTodoAction $createTodoAction)
    {
        $todoData = TodoData::fromRequest($request);
        $createTodoAction->execute($todoData);
        
        return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function edit(int $id)
    {
        $todo = $this->todoRepository->findById($id);
        
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found!');
        }
        
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoRequest $request, int $id, UpdateTodoAction $updateTodoAction)
    {
        $todoData = TodoData::fromRequest($request);
        $todo = $updateTodoAction->execute($id, $todoData);
        
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found!');
        }
        
        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }

    public function destroy(int $id, DeleteTodoAction $deleteTodoAction)
    {
        $result = $deleteTodoAction->execute($id);
        
        if (!$result) {
            return redirect()->route('todos.index')->with('error', 'Todo not found!');
        }
        
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

    public function toggle(int $id, ToggleTodoCompletionAction $toggleTodoCompletionAction)
    {
        $todo = $toggleTodoCompletionAction->execute($id);
        
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found!');
        }
        
        return redirect()->route('todos.index');
    }
}
