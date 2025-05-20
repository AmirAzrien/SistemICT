<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - Sistem Kerajaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1691147318681-e4f092efc350?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .registration-container {
            background: #ffffff;
            backdrop-filter: blur(10px);
            border-radius: 15px;
            max-width: 600px;
        }

        .gov-logo {
            width: 120px;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #003366;
            border-color: #002244;
        }

        .btn-primary:hover {
            background-color: #002244;
            border-color: #001122;
        }

        .form-control:focus {
            border-color: #003366;
            box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.25);
        }

        .footer-links {
            font-size: 0.9rem;
            color: #666;
        }

        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="d-flex align-items-center py-4">

    {{-- loading overlay --}}
    <div id="loading-overlay" style="display: none;">
        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div class="container">
        <div class="registration-container mx-auto p-4 p-md-5 shadow">
            <!-- Government Logo -->
            <div class="text-center mb-4">
                <img src="https://images.seeklogo.com/logo-png/30/1/kerajaan-negeri-johor-logo-png_seeklogo-306450.png"
                    alt="Government Logo" class="gov-logo img-fluid">
                <h2 class="h4 mb-3">Pendaftaran Pengguna Baharu</h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Penuh IC/Passport</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">(Cth: Ahmad bin Ali)</small>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat E-mel</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">(Cth: AhmadAli@yahoo.com)</small>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Laluan</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Pengesahan Kata Laluan</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <p>Sudah berdaftar?<a href="{{ route('login') }}" class="text-decoration-none">
                            Log Masuk
                        </a>
                    </p>

                    <button type="submit" class="btn btn-primary">
                        Daftar Akaun
                    </button>
                </div>

                <!-- Terms & Conditions -->
                <div class="footer-links text-center mt-4">
                    <p class="mb-0">Dengan mendaftar, anda bersetuju dengan <a href="#"
                            class="text-decoration-none">Terma & Syarat</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('beforeunload', function() {
            document.getElementById('loading-overlay').style.display = 'flex';
        });
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading-overlay').style.display = 'none';
            }, 5000); // Overlay stays 1.5s after new page loads
        });
    </script>
</body>

</html>
