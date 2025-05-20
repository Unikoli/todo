<?php

namespace App\DataTransferObjects;

use App\Http\Requests\TodoRequest;
use Carbon\Carbon;

class TodoData
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $description,
        public readonly ?Carbon $due_date
    ) {
    }

    public static function fromRequest(TodoRequest $request): self
    {
        return new self(
            title: $request->title,
            description: $request->description,
            due_date: $request->due_date ? Carbon::parse($request->due_date) : null
        );
    }
}
