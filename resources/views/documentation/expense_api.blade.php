<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense API Documentation</title>
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

        h1,
        h2 {
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

        <h2>1. <code>POST /api/expense</code></h2>
        <p><strong>Description:</strong> Retrieve a list of expenses for the authenticated user.</p>
        <h3>Headers:</h3>
        <pre>
            <code>user_id: string (required)</code>
            <code>token: string (required) This is the user's login token.</code>
        </pre>
        <p><strong>Response:</strong></p>
        <p><code>200 OK</code>: A list of expenses for the user.</p>
        <pre><code>{
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "reason": "Food",
            "amount": 200,
            "description": "Lunch",
            "date": "2024-01-01",
            "created_at": "2024-06-03T00:00:00.000000Z",
            "updated_at": "2024-06-03T00:00:00.000000Z"
        },
        ...
    ]
}</code></pre>
        <p><code>404 Not Found</code>: User ID not found in the request header.</p>
        <pre><code>{
    "message": "User not found"
}</code></pre>
        <p><code>401 Unauthorized</code>: User ID does not match any user in the database.</p>
        <pre><code>{
    "message": "Unauthorized access."
}</code></pre>
        <p><code>500 Internal Server Error</code>: Something went wrong on the server.</p>
        <pre><code>{
    "message": "Something went wrong",
    "error": "Error details"
}</code></pre>

        <h2>2. <code>POST /api/store/expense</code></h2>
        <p><strong>Description:</strong> Store a new expense record for the authenticated user.</p>
        <h3>Headers:</h3>
        <pre>
            <code>user_id: string (required)</code>
            <code>token: string (required) This is the user's login token.</code>
        </pre>
        <h3>Body Parameters:</h3>
        <pre><code>reason: string (required)
amount: numeric (required)
description: string (optional)
date: date (optional)</code></pre>
        <p><strong>Response:</strong></p>
        <p><code>200 OK</code>: Expense created successfully.</p>
        <pre><code>{
    "message": "Expense created successfully."
}</code></pre>
        <p><code>400 Bad Request</code>: Validation errors for the request parameters.</p>
        <pre><code>{
    "errors": {
        "reason": [
            "The reason field is required."
        ],
        "amount": [
            "The amount field is required."
        ]
    }
}</code></pre>
        <p><code>401 Unauthorized</code>: User ID does not match any user in the database.</p>
        <pre><code>{
    "message": "Unauthorized access."
}</code></pre>
        <p><code>500 Internal Server Error</code>: Something went wrong on the server.</p>
        <pre><code>{
    "message": "Something went wrong",
    "error": "Error details"
}</code></pre>
    </div>
</body>

</html>
