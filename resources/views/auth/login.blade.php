
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Kaderisasi</title>
    <link rel="stylesheet" href="assets1/css/main/app.css">
    <link rel="stylesheet" href="assets1/css/pages/auth.css">
    <link rel="shortcut icon" href="assets1/images/logo/IMM.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets1/images/logo/IMM.png" type="image/png">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 d-flex align-items-center justify-content-center" style="background-image: linear-gradient(#2d499d, #3f5491);">
                <img src='assets1/images/logo/IMM.png' alt="" width="55%" height="65%">
            </div>
            <div class="col-lg-5 container-fluid d-flex align-items-center justify-content-center vh-100">
                <div class="overflow-hidden br-22 mb-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center p-2">
                                <h3 class="text-primary mb-2 font-weight-bold">
                                    PC IMM Kota Surakarta
                                </h3>
                                <h4 class="text-dashboard mb-2 font-weight-bold">
                                    Sistem Informasi Kaderisasi
                                </h4>
                                <p class="text-muted mb-0">
                                    Silahkan masuk menggunakan akun anda!
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12 p-0 p-md-5">
                            <div class="p-0">
                                <form class="form-horizontal" action="{{ route('login') }}" autocomplete="off" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            name="username" value="{{ old('username') }}"
                                            placeholder="Masukkan Username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" value="{{ old('password') }}"
                                                placeholder="Masukkan Kata Sandi">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" >
                                        Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
