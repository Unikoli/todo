<?php

namespace App\Actions\Todos;

use App\DataTransferObjects\TodoData;
use App\Models\Todo;
use App\Repositories\TodoRepositoryInterface;

class UpdateTodoAction
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(int $todoId, TodoData $todoData): ?Todo
    {
        return $this->todoRepository->update(
            id: $todoId,
            title: $todoData->title,
            description: $todoData->description,
            due_date: $todoData->due_date ? $todoData->due_date->format('Y-m-d') : null
        );
    }
}
