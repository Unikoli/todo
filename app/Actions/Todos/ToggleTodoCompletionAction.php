<?php

namespace App\Actions\Todos;

use App\Models\Todo;
use App\Repositories\TodoRepositoryInterface;

class ToggleTodoCompletionAction
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(int $todoId): ?Todo
    {
        return $this->todoRepository->toggleCompletion($todoId);
    }
}
