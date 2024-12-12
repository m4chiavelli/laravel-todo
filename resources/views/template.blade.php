<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Todolist Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ12ut3KqzjYcKjlQq8r8r6EdiYnaPbKyt7pVymFdbOg1wMvzD53t+N6X2jW" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1Lm96IqkRhNlTtBGaS1V1G43J4dXVV49+fpk0ZnAh1Zl6PTxzo1jM5fu/Kr0z0Vo" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .btn-danger {
            background-color: #e74a3b;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .form-control, .form-floating label {
            border-radius: 10px;
        }
        h1 {
            color: #333;
        }
        .todo-table td, .todo-table th {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5 mt-5">
    <!-- Alert -->
    <div class="row mb-4">
        <div class="alert alert-warning text-center" role="alert">
            Please log in to access your Todo list.
        </div>
    </div>

    <!-- Login Form -->
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Login</h1>
            <p class="col-lg-10 fs-4">Enter your credentials to start managing your tasks.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/login">
                <div class="form-floating mb-3">
                    <input name="user" type="text" class="form-control" id="user" placeholder="Enter your username">
                    <label for="user">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>
        </div>
    </div>

    <!-- Logout Form -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <form method="post" action="/logout">
                <button class="w-25 btn btn-lg btn-danger" type="submit">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </button>
            </form>
        </div>
    </div>

    <!-- Todolist Section -->
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Todolist Management</h1>
            <p class="col-lg-10 fs-4">Keep track of your tasks efficiently.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/todolist">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="todo" placeholder="Add a new todo">
                    <label for="todo">New Todo</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">
                    <i class="fas fa-plus-circle"></i> Add Todo
                </button>
            </form>
        </div>
    </div>

    <!-- Todolist Table -->
    <div class="row">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none"></form>
            <table class="table table-striped todo-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Todo</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Learn Laravel Basics</td>
                        <td>
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </td>
                    </tr>
                    <!-- Add more todos dynamically here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
