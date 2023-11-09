# Simple Blog Restful API Application

Welcome to the Simple Blog Restful API Application. This application is designed to provide a platform where users can perform CRUD (Create, Read, Update, Delete) operations on blog posts. It's built with Laravel and uses Sanctum for token-based authentication.

## Features

### CRUD Operations
Users can create, read, update, and delete blog posts. This provides a dynamic and interactive blogging experience.

### Authentication
The application uses Laravel Sanctum, a lightweight authentication system for single-page applications, mobile applications, and simple, token-based APIs. It provides a simple way of authenticating users via tokens.

### Validation
To ensure the quality of the content, we have implemented validation for the post title and content. This helps maintain a high standard of posts on our platform.

### Feature Tests
We have written feature tests for the API endpoints. This ensures that our application works as expected and helps us identify any issues or bugs that may arise.

### Postman Collection
We have created a Postman collection that you can use to test the login, register, and CRUD operations. This makes it easy to test the functionality of our application.

## Database Credentials

Here are the database credentials for the application:

- DB_CONNECTION: mysql
- DB_HOST: mysql
- DB_PORT: 3306
- DB_DATABASE: laravel_task
- DB_USERNAME: sail
- DB_PASSWORD: password

## Setup
To install this project, you need to have PHP, Composer, and MySQL installed on your system. You can also use Laravel Sail to run the project in a Docker container.

Follow these steps to set up the application:

1. Clone the repository: `git clone https://github.com/khalid2kasem/Simple-Blog-Restfull-api-Aplication.git`
2. Navigate to the project directory: `cd Simple-Blog-Restfull-api-Aplication`
3. Install dependencies: `composer install`
4. Generate an application key using php artisan: `key:generate`
5. Set up your database credentials in the .env file.
- DB_CONNECTION: mysql
- DB_HOST: mysql
- DB_PORT: 3306
- DB_DATABASE: laravel_task
- DB_USERNAME: sail
- DB_PASSWORD: password
4. Run migrations: `php artisan migrate`
5. Seed the database: `php artisan db:seed` or `php artisan migrate:fresh --seed` to make both command at once.
6. Start the server: `php artisan serve` or `sail up -d`

## Testing

To run the feature tests, use the command: `php artisan test`

## Usage
You can use Postman or any other API client to test the API endpoints. You can also import the Postman collection provided.

The available endpoints are:

POST /api/register: Register a new user with name, email, and password.
POST /api/login: Login an existing user with email and password. Returns a token and a user object.
GET /api/posts: Get all the posts. Returns json for all posts.
GET /api/posts/{id}: Get a single post by id. Returns a post object.
POST /api/posts: Create a new post with title and content. Requires authentication. Returns a post object.
PUT /api/posts/{id}: Update an existing post by id with title and content. Returns a post object.
DELETE /api/posts/{id}: Delete an existing post by id.
