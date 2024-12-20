<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Tinggi penuh viewport */
            margin: 0;
            /* Menghapus margin default */
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 900px;
        }

        .form-floating input,
        .form-floating label {
            font-size: 1.1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        h1 {
            font-size: 3.5rem;
            color: #fff;
            font-weight: 700;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 1.2rem;
            color: #fff;
        }

        .alert-danger {
            border-radius: 10px;
            padding: 15px;
            font-weight: bold;
        }

        .btn-icon {
            font-size: 1.5rem;
        }

        .form-control {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        @if(isset($error))
        <div class="row">
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-center align-items-center row g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">TO-DO-LIST APP<br> Login <i class="fas fa-user-lock"></i></h1>
                <p class="col-lg-10 fs-4 text-secondary">Fery Adi - G.131.21.0042</p>
                <p class="col-lg-10 fs-4 text-secondary">Irnatha Nasywa - G.131.21.0052</p>
                <p class="col-lg-10 fs-4 text-secondary">Syarifatul M - G.131.21.0041</p>
                <p class="col-lg-10 fs-4 text-secondary"></p>

            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/login">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="user" type="text" class="form-control" id="user" placeholder="id">
                        <label for="user">Username <i class="fas fa-user"></i></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        <label for="password">Password <i class="fas fa-key"></i></label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">
                        Sign In <i class="fas fa-sign-in-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>