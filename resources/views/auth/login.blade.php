<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Bengkel Las Wira Jaya</title>
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
                        <h5 class="card-title text-center mb-5 fs-3"><strong>Login</strong></h5>
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0"
                                role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-success alert-dismissible fade show w-100 me-4 rounded-0"
                                role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ URL::to('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan email yang benar.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control
                                    @error('password') is-invalid @enderror""
                                    id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Masukkan minimal 8 karakter.
                                </div>
                            </div>

                            {{-- <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                </label>
                            </div> --}}
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                    type="submit">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <p>Belum punya akun? <a href="/register">Signup</a> | <a
                                        href="{{ route('reset') }}">Lupa Password</a></p>

                            </div>
                            <hr class="my-4">
                        </form>
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
