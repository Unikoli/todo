<?php

namespace App\Actions\Todos;

use App\Repositories\TodoRepositoryInterface;

class DeleteTodoAction
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(int $todoId): bool
    {
        return $this->todoRepository->delete($todoId);
    }
}
