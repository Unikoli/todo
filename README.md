# ✅ Laravel Todo App – Powered by the Actions Pattern

A clean and modern **Todo Application** built with **Laravel**, implementing the **Actions Pattern** to separate business logic. Manage your tasks with ease—create, update, delete, and mark todos as complete or incomplete.

---

## 🚀 Features

- ✏️ Create, Read, Update, and Delete (CRUD) todos
- ✅ Mark todos as complete/incomplete
- 📅 Add and validate due dates
- 🔍 Filter todos: All | Active | Completed
- 🧪 Feature tests for all actions
- 💡 Uses Data Transfer Objects (DTOs)
- 🎯 Clean architecture with Actions Pattern
- 🧼 Code formatted with Laravel Pint
- 🔁 Code refactored with PHP Rector
- 💾 SQLite for lightweight storage

---

## 🛠️ Tech Stack

- **Laravel 10+**
- **SQLite**
- **Actions Pattern**
- **DTOs**
- **PHP 8.1+**
- **Composer**
- **Laravel Pint**
- **PHP Rector**

---

## ⚙️ Project Setup

### ✅ Prerequisites

- PHP >= 8.1
- Composer
- SQLite installed
- Git

---

### 📥 Installation Guide

1. **Clone the Repository**

```bash
git clone https://github.com/Unikoli/todo.git
cd todo
Install Dependencies

bash
Copy
Edit
composer install
Set Up Environment File

bash
Copy
Edit
cp .env.example .env
Generate Application Key

bash
Copy
Edit
php artisan key:generate
Configure SQLite Database

Open .env and update the database settings:

env
Copy
Edit
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
Create the SQLite Database File

bash
Copy
Edit
# For macOS/Linux
touch database/database.sqlite

# For Windows (Command Prompt)
type nul > database\database.sqlite
Run Migrations

bash
Copy
Edit
php artisan migrate
(Optional) Seed with Sample Data

bash
Copy
Edit
php artisan db:seed
Start the Server

bash
Copy
Edit
php artisan serve
Open your browser and visit:
👉 http://localhost:8000

🌱 Database Seeding
To populate your database with sample todos:

bash
Copy
Edit
# Seed only
php artisan db:seed

# Or refresh everything and seed
php artisan migrate:fresh --seed
📂 Folder Structure Highlight
bash
Copy
Edit
app/
├── Actions/         # Business logic organized as Actions
├── DTOs/            # Data Transfer Objects
├── Models/          # Eloquent Models
├── Http/
│   └── Controllers/ # Route controllers
🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you'd like to change.

📄 License
This project is open-source under the MIT License.

Happy coding! 💻✨
— Unik Oli