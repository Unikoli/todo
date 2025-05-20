```markdown
# Laravel Todo Application with Actions Pattern

This is a simple Todo application built with Laravel that implements the Actions Pattern for business logic. The application allows users to create, read, update, and delete todo items, as well as mark them as complete or incomplete.

## Features

- Todo item CRUD operations
- Mark todos as complete/incomplete
- Filter todos by status (all/active/completed)
- Due dates for todos with validation
- Basic validation for todo items

## Technical Implementation

- Actions Pattern for business logic
- PHP Rector for code refactoring
- Laravel Pint for code formatting
- Data Transfer Objects (DTOs) for data handling
- SQLite database for data storage
- Feature tests for actions

## Project Setup

### Prerequisites

- PHP 8.1 or higher
- Composer
- SQLite (or any database of your choice)

### Installation

1. Clone the repository:
```

git clone [https://github.com/Unikoli/todo.git]
cd todo

```plaintext

2. Install dependencies:
```

composer install

```plaintext

3. Create a copy of the `.env` file:
```

cp .env.example .env

```plaintext

4. Generate an application key:
```

php artisan key:generate

```plaintext

5. Configure the database in `.env`:
```

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

```plaintext

6. Create the SQLite database file:
```