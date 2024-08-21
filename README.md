# Task Manager System

Welcome to the Task Manager System project! This README provides information on how to set up and run the Laravel application.

## Prerequisites

Before starting, make sure you have the following installed on your machine:

- PHP 8.1 or higher
- Composer
- Node.js & npm
- MySQL
- Redis

## Installation

1. Clone the repository to your local machine:
   git clone <repository-url>

2. Change into the project directory:
   cd task-manager

3. Install the project dependencies using Composer:
   composer install

4. Install the front-end dependencies using npm:
   npm install

5. Create a copy of the `.env` file and configure it with your local environment settings:
   cp .env .env.local

   Edit the `.env.local` file and set the necessary configuration options such as database connection details and queue settings.

6. Create the database:
   php artisan migrate

## Running the Application

To start the Laravel development server, run the following command from the project root directory:
php artisan serve

You should see output indicating that the server has started and is listening for requests.

Access the application in your web browser by navigating to `http://localhost:8000` or the URL shown in the console output.

### Main Route (Dashboard)

The main route of the application, which serves the dashboard, is accessible at:
`http://localhost:8000/dashboard`

This route displays the task management dashboard where you can view, create, update, and delete tasks.

### API Route for Postman

You can interact with the tasks via API using the following route:

`Route::apiResource('/tasks', TaskController::class);`

To use Postman for testing the API, follow these steps:

1. Open Postman and create a new request.
2. Set the method to GET, POST, PUT, or DELETE depending on the action you want to perform.
3. Use the URL `http://localhost:8000/api/tasks` for the request.
4. For POST and PUT requests, provide the necessary data in the body in JSON format, such as:
   ```json
   {
       "title": "Task Title",
       "description": "Task Description",
       "due_date": "2024-08-21",
       "priority": "high",
       "status": "pending"
   }
