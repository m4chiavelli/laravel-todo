<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #3a8dff, #00c6ff); /* Gradasi biru cerah */
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
        }

        .form-floating input,
        .form-floating label {
            font-size: 1.1rem;
        }

        .btn-primary {
            background-color: #00c6ff;
            border-color: #00c6ff;
            transition: background-color 0.3s, border-color 0.3s;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #009fcc;
            border-color: #009fcc;
        }

        h1 {
            font-size: 3.5rem;
            color: #333; /* Mengubah warna teks judul menjadi abu-abu gelap */
            font-weight: 700;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan lebih lembut */
        }

        p {
            font-size: 1.2rem;
            color: #333; /* Mengubah warna teks deskripsi menjadi abu-abu gelap */
        }

        .alert-danger {
            border-radius: 10px;
            padding: 15px;
            font-weight: bold;
        }

        .form-control {
            font-size: 1rem;
            border-radius: 10px;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 1rem;
            text-align: center;
        }

        .btn-icon {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">

    @if(session('error'))
        <div class="row">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @elseif(session('success'))
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col text-end">
            <form method="post" action="/logout">
                @csrf
                <button class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </button>
            </form>
        </div>
    </div>

    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">To Do List</h1>
            <p class="lead">Kelola daftar tugas Anda dengan mudah dan efisien.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/todolist">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="todo" placeholder="Todo" required>
                    <label for="todo">Todo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="time" class="form-control" name="time" placeholder="Waktu" required>
                    <label for="time">Waktu Mulai</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
                    <i class="fas fa-plus"></i> Add Todo
                </button>
            </form>
        </div>
    </div>

    <div class="row g-lg-5">
        <div class="mx-auto">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">To Do</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todolist as $todo)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$todo['todo']}}</td>
                        <td>{{$todo['time']}}</td>
                        <td>
                            <form action="/todolist/{{$todo['id']}}/delete" method="post" onsubmit="confirmDelete(event)">
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(event) {
        if (!confirm("Apakah Anda yakin ingin menghapus to do ini?")) {
            event.preventDefault();
        }
    }
</script>
</body>
</html>
