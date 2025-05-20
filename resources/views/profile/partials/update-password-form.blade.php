<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @vite(['resources/css/home.css'])
</head>

<body>
    <!-- Main Content -->
    <div class="container my-5">
        <div class="main-content p-4 p-md-5 shadow-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium">
                        {{ __('Kemaskini Kata Laluan') }}
                    </h2>
                    <p class="mt-1 text-sm">
                        {{ __('Pastikan akaun anda menggunakan kata laluan yang panjang dan rawak untuk kekal selamat.') }}
                    </p>
                </header>

                <form method="post" action="#" class="mt-6 space-y-6">
                    <div>
                        <label for="current_password" class="form-label">{{ __('Kata Laluan Semasa') }}</label>
                        <input id="current_password" name="current_password" type="password" class="form-control"
                            autocomplete="current-password" required>
                    </div>
                    <br>
                    <div>
                        <label for="password" class="form-label">{{ __('Kata Laluan Baru') }}</label>
                        <input id="password" name="password" type="password" class="form-control"
                            autocomplete="new-password" required>
                    </div>
                    <br>
                    <div>
                        <label for="password_confirmation" class="form-label">{{ __('Sahkan Kata Laluan') }}</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control" autocomplete="new-password" required>
                    </div>
                    <br>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-johor">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
