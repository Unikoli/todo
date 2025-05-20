<?php

namespace App\Actions\Todos;

use App\Repositories\TodoRepositoryInterface;
use Illuminate\Support\Collection;

class ListTodosAction
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(string $filter = 'all'): Collection
    {
        return $this->todoRepository->getByStatus($filter);
    }
}
