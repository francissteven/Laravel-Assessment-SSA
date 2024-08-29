Here's the revised README file without the routes, route macro, model accessor, and troubleshooting sections:

---

# User Management System

## Overview

This User Management System is built with Laravel, providing CRUD (Create, Read, Update, Delete) functionality along with soft delete features. The application allows for user management, including viewing, editing, and soft deleting users, as well as restoring and permanently deleting soft-deleted users.

## Features

- **CRUD Operations**: Create, view, edit, and delete users.
- **Soft Deletes**: Soft delete users, view soft-deleted users, restore soft-deleted users, and permanently delete soft-deleted users.

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/francissteven/Laravel-Assessment-SSA.git
   ```

2. **Navigate to the Project Directory**

   ```bash
   cd Laravel-Assessment-SSA
   ```

3. **Install Dependencies**

   ```bash
   composer install
   ```

4. **Set Up Environment Variables**

   Copy `.env.example` to `.env` and configure your database and other environment settings.

   ```bash
   cp .env.example .env
   ```

   Generate an application key:

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**

   ```bash
   php artisan migrate
   ```

6. **Seed the Database (Optional)**

   ```bash
   php artisan db:seed
   ```

7. **Start the Development Server**

   ```bash
   php artisan serve
   ```
## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.