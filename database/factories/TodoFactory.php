<?php
// database/factories/TodoFactory.php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(2),
            'is_completed' => $this->faker->boolean(20),
            'due_date' => $this->faker->optional(70)->dateTimeBetween('now', '+2 weeks'),
        ];
    }

    public function completed(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_completed' => true,
            ];
        });
    }

    public function active(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_completed' => false,
            ];
        });
    }
}