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
            <section class="space-y-6 delete-user-wrapper">
                <header>
                    <h2 class="text-lg font-medium">
                        {{ __('Padam Akaun') }}
                    </h2>

                    <p class="mt-1 text-sm">
                        {{ __('Sekiranya akaun anda dipadam, semua sumber dan data berkaitan akan dipadam secara kekal. Sebelum memadamkan akaun anda, sila muat turun sebarang data atau maklumat yang anda ingin simpan.') }}
                    </p>
                </header>

                <!-- Button to Open Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal">
                    {{ __('Padam Akaun') }}
                </button>

                <!-- Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">{{ __('Padam Akaun') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    {{ __('Adakah anda pasti ingin memadamkan akaun anda?') }}<br>
                                    {{ __('Sekali akaun anda dipadam, semua sumber dan data berkaitan akan dipadamkan secara kekal. Sila masukkan kata laluan anda untuk mengesahkan bahawa anda ingin memadamkan akaun ini secara kekal.') }}
                                </p>
                                <form method="post" action="#" class="mt-6 space-y-6">
                                    <div class="mb-3">
                                        <label for="password_delete" class="form-label">{{ __('Kata Laluan') }}</label>
                                        <input type="password" class="form-control" id="password_delete"
                                            placeholder="Kata Laluan">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('Batal') }}</button>
                                <button type="button" class="btn btn-danger">{{ __('Padam Akaun') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
