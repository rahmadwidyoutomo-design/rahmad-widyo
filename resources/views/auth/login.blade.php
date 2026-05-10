<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #2563eb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.7rem 1rem;
            border: 1.5px solid #e2e8f0;
        }
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }
        .btn-primary {
            background: #2563eb;
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="login-card">
            <div class="text-center mb-4">
                <div style="width:60px; height:60px; background:#eff6ff; border-radius:16px; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem;">
                    <i class="bi bi-shield-lock text-primary fs-3"></i>
                </div>
                <h4 class="fw-bold">Admin Panel</h4>
                <p class="text-muted small">Rahmad Widyo Personal Website</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger rounded-3 small">
                <i class="bi bi-exclamation-circle me-1"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0;">
                            <i class="bi bi-envelope text-muted"></i>
                        </span>
                        <input type="email" name="email" class="form-control border-start-0" style="border-radius:0 10px 10px 0;"
                            value="{{ old('email') }}" placeholder="Email admin" required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold small">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0;">
                            <i class="bi bi-lock text-muted"></i>
                        </span>
                        <input type="password" name="password" class="form-control border-start-0" style="border-radius:0 10px 10px 0;"
                            placeholder="Password" required>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
                    <i class="bi bi-arrow-left me-1"></i>Kembali ke Website
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
