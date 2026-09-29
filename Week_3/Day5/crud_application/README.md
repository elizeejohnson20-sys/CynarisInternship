# Laravel Blog CRUD Application

A complete Blog CRUD application built with Laravel 13.

## Features

- Create blog posts
- View blog posts
- Update blog posts
- Delete blog posts
- Form Request validation
- Validation error messages using Blade `@error`
- Unique post titles
- CSRF protection
- Pagination using Eloquent `paginate()`
- SQLite database
- Laravel Blade views
- Eloquent ORM

## Technologies Used

- PHP 8.5.10
- Laravel 13
- SQLite
- Blade
- Eloquent ORM
- Composer
- VS Code
- Git
- GitHub

## Project Structure

```text
crud_application/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PostController.php
│   │   └── Requests/
│   │       └── PostRequest.php
│   └── Models/
│       └── Post.php
├── database/
│   ├── factories/
│   │   └── PostFactory.php
│   ├── migrations/
│   │   └── create_posts_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       └── posts/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── show.blade.php
│           └── edit.blade.php
├── routes/
│   └── web.php
└── README.md