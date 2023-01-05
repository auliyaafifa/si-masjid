<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Baitul Amin</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-10">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/" class="h3">Masjid Baitul Amin</a>
                    </div>
                    <h6 class="title-center mb-2">Silahkan masuk</h6>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="email" class="form-control form-control-l" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="password" class="form-control form-control-l" placeholder="Password"
                                name="password" value="{{ old('password') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            {{-- <input class="form-check-input me-2" type="checkbox" name="remember"
                                id="flexCheckDefault" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label> --}}
                        </div>
                        <button class="btn btn-primary btn-block btn-l shadow-md mt-0">Masuk</button>
                    </form>
                    {{-- <div class="text-center mt-3 text-lg fs-6">
                        <p><a class="font-bold" href="{{ route('password.request') }}">Lupa Password?</a>.</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-image: url({{ asset('img/wlp1.jpg') }}); background-size: cover;">
                </div>
            </div>
        </div>

    </div>
</body>

</html>