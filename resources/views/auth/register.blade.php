<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Bengkel Las Wira Jaya</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fs-3">Signup</h5>
                        @if ($message = Session::get('msg'))
                            <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0"
                                role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="/register" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Name"
                                    name="name" value="{{ old('name') }}">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" placeholder="name@example.com" name="email"
                                    value="{{ old('email') }}">
                                <label for="floatingInput">Email address</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan email yang sesuai.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword" placeholder="Password" name="password"
                                    value="{{ old('password') }}">
                                <label for="floatingPassword">Password</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan minimal 8 karakter.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword" placeholder="Confirm password" value="{{ old('password') }}"
                                    name="konfirmasi">
                                <label for="floatingPassword">Confirm Password</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan minimal 8 karakter.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('notelp') is-invalid @enderror"
                                    id="floatingInput" placeholder="Telp Number" name="notelp"
                                    value="{{ old('notelp') }}">
                                <label for="floatingInput">Telp Number</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan minimal 11 karakter.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Alamat"
                                    name="alamat" value="{{ old('alamat') }}">
                                <label for="floatingInput">Alamat</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Image</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file"
                                    name="image" value="{{ old('image') }}">

                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                    type="submit">Signup</button>
                        </form>
                        <hr class="my-4">
                        <div class="text-center">
                            <p>Sudah punya akun? <a href="\login"><strong>Login</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
