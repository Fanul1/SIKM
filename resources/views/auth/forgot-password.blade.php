<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        background: #d3d3d3;
    }
    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form {
        background: #fff;
        padding: 50px 30px;
    }
</style>
<body>
    <div class="main">
        <div class="form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            
            <h2>Lupa Kata Sandi</h2>
            <p>Mohon masukkan email and untuk mereset kata sandi</p>
            <form action="{{ route('password.email')}}" method="post">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                <input type="submit" value="Minta Reset Kata Sandi" class="mt-3 btn btn-primary w-100">
            </form>
        </div>
    </div>
</body>
</html>