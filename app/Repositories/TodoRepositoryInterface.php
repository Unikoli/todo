<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Support\Collection;

interface TodoRepositoryInterface
{
    public function all(): Collection;
    
    public function findById(int $id): ?Todo;
    
    public function create(string $title, ?string $description, ?string $due_date): Todo;
    
    public function update(int $id, string $title, ?string $description, ?string $due_date): ?Todo;
    
    public function delete(int $id): bool;
    
    public function toggleCompletion(int $id): ?Todo;
    
    public function getByStatus(string $status): Collection;
}
