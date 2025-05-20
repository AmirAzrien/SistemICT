<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Kerajaan Johor - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1691147318681-e4f092efc350?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            color: #003366;
        }

        .overlay {
            background-color: rgba(0, 0, 50, 0.7);
            height: 100vh;
            min-height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .reset-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .logo {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 120px;
        }

        label,
        .form-text {
            color: #fff;
        }

        .btn-primary {
            background-color: #003366;
            border-color: #002244;
        }

        .btn-primary:hover {
            background-color: #001122;
            border-color: #000a11;
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="reset-container">
            <img src="https://images.seeklogo.com/logo-png/30/1/kerajaan-negeri-johor-logo-png_seeklogo-306450.png"
                alt="Sistem Kerajaan Johor Logo" class="logo">
            <p class="mb-4 text-sm">
                Lupa kata laluan anda? Jangan risau. Sila berikan alamat emel anda dan kami akan menghantar pautan untuk
                menetapkan semula kata laluan. Anda boleh pilih kata laluan baharu melalui pautan tersebut.
            </p>
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-decoration-none">
                    Kembali
                </a>
            @endif
            <form method="POST" action="/password/email">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                    <div class="form-text text-danger" id="emailError"></div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple client-side validation example
        const form = document.querySelector('form');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        form.addEventListener('submit', function(event) {
            emailError.textContent = '';
            if (!emailInput.value) {
                emailError.textContent = 'Please enter your email address.';
                event.preventDefault();
            } else if (!emailInput.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                emailError.textContent = 'Please enter a valid email address.';
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
