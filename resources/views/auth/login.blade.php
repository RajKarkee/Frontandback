<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 1rem 1rem 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    <div class="card-header login-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="fas fa-lock me-2"></i>Admin Login
                        </h3>
                    </div>
                    <div class="card-body p-5">
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror"
                                           type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror"
                                           type="password" name="password" required>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt me-2"></i>Log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
