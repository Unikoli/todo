<?php
// tests/Feature/Actions/CreateTodoActionTest.php

namespace Tests\Feature\Actions;

use App\Actions\Todos\CreateTodoAction;
use App\DataTransferObjects\TodoData;
use App\Repositories\DatabaseTodoRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTodoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_todo(): void
    {
        $repository = new DatabaseTodoRepository();
        $action = new CreateTodoAction($repository);
        
        $todoData = new TodoData(
            title: 'Test Todo',
            description: 'This is a test todo',
            due_date: Carbon::tomorrow()
        );
        
        $todo = $action->execute($todoData);
        
        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'title' => 'Test Todo',
            'description' => 'This is a test todo',
            'is_completed' => false,
        ]);
        
        $this->assertEquals('Test Todo', $todo->title);
        $this->assertEquals('This is a test todo', $todo->description);
        $this->assertFalse($todo->is_completed);
        $this->assertEquals(Carbon::tomorrow()->format('Y-m-d'), $todo->due_date->format('Y-m-d'));
    }
}