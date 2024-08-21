# Task Manager System

Welcome to the Task Manager System project! This README provides information on how to set up and run the Laravel
application.

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

   Edit the `.env.local` file and set the necessary configuration options such as database connection details and queue
   settings.

6. Create the database:
   php artisan migrate

## Running the Application

To start the Laravel development server, run the following command from the project root directory:
php artisan serve

You should see output indicating that the server has started and is listening for requests.

Access the application in your web browser by navigating to `http://localhost:8000` or the URL shown in the console
output.

## Additional Configuration

- If you need to change any application-specific settings, you can modify the `config` files or create your own
  configuration files as needed.
- Refer to the Laravel documentation (https://laravel.com/docs) for more information on customizing and extending the
  application.

## Contributing

To contribute to the Task Manager System project, please follow these steps:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your branch to your forked repository.
5. Submit a pull request to the main repository.
