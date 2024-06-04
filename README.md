# Laravel API for Mobile Application

This Laravel project is designed to serve as a backend API for a mobile application. The frontend of the application is built with React Native, while this Laravel application provides all the necessary API endpoints for authentication, income management, and expense management.

## Table of Contents

- [Installation](#installation)
- [Environment Variables](#environment-variables)
- [Running the Server](#running-the-server)
- [API Documentation](#api-documentation)
- [Routes](#routes)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/your-username/your-repository.git
    cd your-repository
    ```

2. **Install dependencies:**
    ```sh
    composer install
    ```

3. **Copy the `.env.example` file to `.env`:**
    ```sh
    cp .env.example .env
    ```

4. **Generate an application key:**
    ```sh
    php artisan key:generate
    ```

5. **Set up the database:**
    Configure your database settings in the `.env` file.

6. **Run the database migrations:**
    ```sh
    php artisan migrate
    ```

## Environment Variables

Ensure you have the following environment variables set in your `.env` file:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

## Running the Server

Start the Laravel development server using the following command:
```sh
php artisan serve
```
By default, the server runs on http://localhost:8000.

## API Documentation
The API documentation is available at the following endpoints:
```
Authentication API() - Provides details about the authentication endpoints.
Income API - Provides details about the income management endpoints.
Expense API - Provides details about the expense management endpoints.
Routes
```
### Authentication
```
POST /register - Register a new user.
POST /login - Login a user.
Income Management
POST /income - Retrieve a list of incomes for the authenticated user.
POST /store/income - Store a new income record for the authenticated user.
Expense Management
POST /expense - Retrieve a list of expenses for the authenticated user.
POST /store/expense - Store a new expense record for the authenticated user.
```
## Contributing
If you would like to contribute to this project, please fork the repository and submit a pull request. We welcome any improvements or bug fixes.

## License
This project is open-sourced software licensed under the MIT license.