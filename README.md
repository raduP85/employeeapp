# Employee Management APP & API

This is a Laravel-based APP & API for managing employees.

## Setup Instructions

  Follow these steps to set up the project after cloning the repository:

  ### 1. Clone the Repository

  git clone https://github.com/raduP85/employeeapp.git
  
  cd employeeapp

  ### 2. Install Dependencies

  Install PHP dependencies using Composer: composer install

  Install JavaScript dependencies using npm: npm install

  ### 3. Create the Environment File

  Create an .env file: Copy the .env.example file to .env and fill in the required credentials.

  Windows Users: Due to known issues with the built-in PHP web server, it's recommended to set the PHP_CLI_SERVER_WORKERS environment variable to 1 in your .env file:
  PHP_CLI_SERVER_WORKERS=1

  ### 4. Generate Application Key

  Generate the Laravel application key: php artisan key:generate

  ### 5. Run Database Migrations

  Run the database migrations to set up the database schema: php artisan migrate

  ### 6. Seed the Database (Optional)

  The app comes with built in seeders for sample data.
  You can seed the database with initial data: php artisan db:seed

  ### 7.  Run the Development Server

  Compile the assets (vite) and start the development server: 
  npm run dev
  php artisan serve

  ### 8.  Access the Application

  Open your browser and navigate to http://localhost:8000 to access the application.

## API Documentation

Base URL: http://localhost:8000/api

## Endpoints

  ### 1 List All Employees
  Endpoint: /employees
  Method: GET

  Sample Request: curl -X GET "http://localhost:8000/api/employees"

  Sample Response:
  {
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "john.doe@example.com",
            "phone": "+40755123456",
            "job_title": "Software Engineer",
            "salary": 60000,
            "created_at": "2024-11-18T07:02:55.000000Z",
            "updated_at": "2024-11-18T07:02:55.000000Z"
        },
        ...
    ],
    "first_page_url": "http://localhost:8000/api/employees?page=1",
    "from": 1,
    "last_page": 6,
    "last_page_url": "http://localhost:8000/api/employees?page=6",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/employees?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": "http://localhost:8000/api/employees?page=2",
            "label": "2",
            "active": false
        },
        ...
    ],
    "next_page_url": "http://localhost:8000/api/employees?page=2",
    "path": "http://localhost:8000/api/employees",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 51
  }

  ### 2 Create a New Employee
  Endpoint: /employees
  Method: POST
  Headers: Content-Type: application/json

  Sample Request:
  curl -X POST "http://localhost:8000/api/employees" \
  -H "Content-Type: application/json" \
  -d '{
      "name": "Jane Doe",
      "email": "jane.doe@example.com",
      "phone": "+40755123456",
      "job_title": "Project Manager",
      "salary": 80000
  }'

  Sample Response:
  {
    "message": "Employee successfully created.",
    "employee": {
        "name": "Jane Doe",
        "email": "jane.doe@example.com",
        "phone": "+40755123456",
        "job_title": "Project Manager",
        "salary": 80000,
        "updated_at": "2024-11-18T11:14:35.000000Z",
        "created_at": "2024-11-18T11:14:35.000000Z",
        "id": 54
    }
  }

  Note: All fields are required, there is validation for email format, all fields are string format and salary is decimal 10,2

  ### 3 Get a Single Employee
  Endpoint: /employees/{id}
  Method: GET

  Sample Request: curl -X GET "http://localhost:8000/api/employees/54"

  Sample Response:
  {
    "message": "Employee successfully created.",
    "employee": {
        "id": 54,
        "name": "Jane Doe",
        "email": "jane.doe@example.com",
        "phone": "+40755123456",
        "job_title": "Project Manager",
        "salary": 80000,
        "updated_at": "2024-11-18T11:14:35.000000Z",
        "created_at": "2024-11-18T11:14:35.000000Z"
    }
  }

  ### 4 Update an Employee
  Endpoint: /employees/{id}
  Method: PUT
  Headers: Content-Type: application/json

  Sample Request:
  curl -X PUT "http://localhost:8000/api/employees/54" \
  -H "Content-Type: application/json" \
  -d '{
      "name": "Jane Doe",
      "email": "jane.doe@example.com",
      "phone": "+40755123456",
      "job_title": "Project Manager",
      "salary": 90000
  }'

  Sample Response:
  {
    "message": "Employee successfully updated.",
    "employee": {
        "id": 54,
        "name": "Jane Doe",
        "email": "jane.doe@example.com",
        "phone": "+40755123456",
        "job_title": "Project Manager",
        "salary": 90000,
        "updated_at": "2024-11-18T11:14:35.000000Z",
        "created_at": "2024-11-18T11:14:35.000000Z"
    }
  }

  ### 5 Delete an Employee
  Endpoint: /employees/{id}
  Method: DELETE

  Sample Request: curl -X DELETE "http://localhost:8000/api/employees/1"

  Sample Response:
  {
    "message": "Employee successfully deleted."
  }
