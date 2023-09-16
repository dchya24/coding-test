<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="card m-auto mt-5" style="width: 512px;">
        <div class="card-header">
            <span class="card-title">Login Panel Admin</span>
        </div>
        <div class="card-body">
            <form action="{{route('login')}}" method="POST">
                @if (session('error'))
                   <div class="text-danger text-center">{{session('error')}}</div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger text-center">{{$error}}</div>
                    @endforeach
                @endif
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 offset-sm-1 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-3 offset-sm-1 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 offset-sm-4">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
