<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        pre {
            background-color: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            overflow-x: auto;
        }
        code {
            color: #c7254e;
            background-color: #f9f2f4;
            padding: 2px 4px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>API Documentation</h1>

        <h2>1. <code>POST /api/register</code></h2>
        <p><strong>Description:</strong> Register a new user.</p>
        <h3>Body Parameters:</h3>
        <pre><code>name: string (required)
email: string (required, unique, valid email format)
password: string (required, minimum 8 characters, must match confirmPassword)
confirmPassword: string (required, minimum 8 characters)</code></pre>
        <p><strong>Response:</strong></p>
        <p><code>201 Created</code>: User created successfully.</p>
        <pre><code>{
    "message": "User created successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john.doe@example.com",
        "created_at": "2024-06-03T00:00:00.000000Z",
        "updated_at": "2024-06-03T00:00:00.000000Z"
    }
}</code></pre>
        <p><code>400 Bad Request</code>: Validation errors for the request parameters.</p>
        <pre><code>{
    "errors": {
        "email": [
            "The email has already been taken."
        ],
        "password": [
            "The password and confirm password must match."
        ]
    }
}</code></pre>
        <p><code>500 Internal Server Error</code>: Something went wrong on the server.</p>
        <pre><code>{
    "message": "Something went wrong",
    "error": "Error details"
}</code></pre>

        <h2>2. <code>POST /api/login</code></h2>
        <p><strong>Description:</strong> Login a user.</p>
        <h3>Body Parameters:</h3>
        <pre><code>email: string (required, valid email format)
password: string (required, minimum 8 characters)</code></pre>
        <p><strong>Response:</strong></p>
        <p><code>200 OK</code>: Logged in successfully.</p>
        <pre><code>{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john.doe@example.com",
        "created_at": "2024-06-03T00:00:00.000000Z",
        "updated_at": "2024-06-03T00:00:00.000000Z"
    },
    "token": "your-jwt-token-here",
    "message": "Logged in successfully"
}</code></pre>
        <p><code>400 Bad Request</code>: Validation errors for the request parameters.</p>
        <pre><code>{
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
}</code></pre>
        <p><code>401 Unauthorized</code>: Invalid credentials.</p>
        <pre><code>{
    "message": "Invalid credentials"
}</code></pre>
        <p><code>500 Internal Server Error</code>: Something went wrong on the server.</p>
        <pre><code>{
    "message": "Something went wrong",
    "error": "Error details"
}</code></pre>
    </div>
</body>
</html>
