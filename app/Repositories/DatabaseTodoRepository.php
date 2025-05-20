<?php
// app/Repositories/DatabaseTodoRepository.php

namespace App\Repositories;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DatabaseTodoRepository implements TodoRepositoryInterface
{
    public function all(): Collection
    {
        return Todo::orderBy('due_date')->get();
    }

    public function findById(int $id): ?Todo
    {
        return Todo::find($id);
    }

    public function create(string $title, ?string $description, ?string $due_date): Todo
    {
        return Todo::create([
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
            'is_completed' => false,
        ]);
    }

    public function update(int $id, string $title, ?string $description, ?string $due_date): ?Todo
    {
        $todo = $this->findById($id);
        
        if (!$todo) {
            return null;
        }
        
        $todo->update([
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
        ]);
        
        return $todo;
    }

    public function delete(int $id): bool
    {
        $todo = $this->findById($id);
        
        if (!$todo) {
            return false;
        }
        
        return $todo->delete();
    }

    public function toggleCompletion(int $id): ?Todo
    {
        $todo = $this->findById($id);
        
        if (!$todo) {
            return null;
        }
        
        $todo->update([
            'is_completed' => !$todo->is_completed,
        ]);
        
        return $todo;
    }

    public function getByStatus(string $status): Collection
    {
        $query = Todo::query();
        
        if ($status === 'active') {
            $query->where('is_completed', false);
        } elseif ($status === 'completed') {
            $query->where('is_completed', true);
        }
        
        return $query->orderBy('due_date')->get();
    }
}