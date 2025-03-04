<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .btn-custom-green {
            background-color: #41C46B;
            border-color: #41C46B;
            color: white;
            transition: 0.3s;
        }

        .btn-custom-green:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .custom-bg {
            background-color: #F8F9FA;
            padding: 12px;
            border-radius: 5px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="col-12 col-md-8 col-lg-4">
        <div class="card border-0 shadow rounded-4">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <a href="#">
                        <img src="{{ asset('assets/img/bsb-logo.svg') }}" alt="Logo" width="175">
                    </a>
                </div>
                <h4 class="text-center mb-4">Login</h4>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control custom-bg @error('email') is-invalid @enderror" 
                               name="email" id="email" placeholder="Masukkan email Anda" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control custom-bg @error('password') is-invalid @enderror" 
                               name="password" id="password" placeholder="Masukkan password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-custom-green" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
