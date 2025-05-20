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

<body class="d-flex flex-column h-100">

    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status"></div>
            <div class="loading-text">Memuatkan Sistem...</div>
        </div>
    </div>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg johor-header shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://images.seeklogo.com/logo-png/30/1/kerajaan-negeri-johor-logo-png_seeklogo-306450.png"
                    alt="Jata Johor" class="johor-logo">
                <div>
                    <span class="d-block fw-bold">SISTEM PENTADBIRAN</span>
                    <small class="d-block text-muted">JOHOR DARUL TA'ZIM</small>
                </div>
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (auth()->user()->type == 1)
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('dashboard.umum') }}">UTAMA</a>
                        </li>
                    @endif
                    @if (auth()->user()->type == 2)
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('dashboard.sekretariat') }}">UTAMA</a>
                        </li>
                    @endif
                    @if (auth()->user()->type == 3)
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('dashboard.adminjabatan') }}">UTAMA</a>
                        </li>
                    @endif
                    @if (auth()->user()->type == 4)
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('dashboard.superadmin') }}">UTAMA</a>
                        </li>
                    @endif
                    @if (in_array(auth()->user()->type, [2, 3, 4]))
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor active" href="{{ route('pengguna') }}">PENGGUNA</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('permohonan.index') }}">PERMOHONAN</a>
                    </li>
                    @if (in_array(auth()->user()->type, [3, 4]))
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('pengurusan.index') }}">PENGURUSAN</a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-johordua dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">PROFIL</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">LOG KELUAR</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content mt-5">
            <h1 class="text-center mb-4" style="color:#003366;">
                <i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru
            </h1>

            <form method="post" action="{{ route('pengguna.store') }}" id="userForm">
                @csrf
                <div class="form-group mb-4">
                    <select name="type" id="type" class="form-control" style="border-radius: 0;">
                        <option value="1">Pengguna Umum</option>
                        <option value="2">Sekretariat</option>
                        <option value="3">Admin Jabatan</option>
                        <option value="4">Super Admin</option>
                    </select>
                    <small class="form-text text-muted">(Sila pilih jenis pengguna)</small>
                </div>

                <div class="mb-4">
                    <div class="input-group" style="border-top-right-radius: 0;">
                        <span class="input-group-text">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </span>
                        <input id="jawatan" name="jawatan" type="text" class="form-control with-icon"
                            placeholder="Jawatan" required>
                    </div>
                    <small class="form-text text-muted">(Contoh: Penolong Pegawai Teknologi Maklumat)</small>
                </div>


                <div class="mb-4">
                    <div class="input-group" style="border-top-right-radius: 0;">
                        <span class="input-group-text">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                        </span>
                        <input id="jabatan" name="jabatan" type="text" class="form-control with-icon"
                            placeholder="Jabatan/Bahagian" required>
                    </div>
                    <small class="form-text text-muted">(Contoh: Jabatan Teknologi Maklumat)</small>
                </div>

                <div class="mb-4">
                    <div class="input-group" style="border-top-right-radius: 0;">
                        <span class="input-group-text">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <input id="name" name="name" type="text" class="form-control with-icon"
                            placeholder="Masukkan nama penuh" required>
                    </div>
                    <small class="form-text text-muted">(Contoh: Ali bin Abu)</small>
                </div>

                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope form" aria-hidden="true"></i>
                        </span>
                        <input id="email" name="email" type="email" class="form-control with-icon"
                            placeholder="Masukkan alamat emel" required>
                    </div>
                    <small class="form-text text-muted">(Contoh: AliAbu@demo.com)</small>
                </div>

                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input id="notel" name="notel" type="text" class="form-control with-icon"
                            placeholder="Masukkan nombor telefon" required pattern="[0-9]{10,11}">
                    </div>
                    <small class="form-text text-muted">(Contoh: 0123456789)</small>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Kata Laluan</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Masukkan kata laluan" style="height: 50px;" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password"
                            onclick="togglePassword('password', this)" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-instructions mt-2">
                        <small class="text-muted">
                            Gunakan sekurang-kurangnya 8 aksara, termasuk huruf besar, huruf kecil, nombor, dan simbol.
                        </small>
                    </div>
                    <div class="password-strength mt-2">
                        <div class="progress">
                            <div id="passwordStrengthBar" class="progress-bar" role="progressbar"
                                style="width: 0%;"></div>
                        </div>
                        <small id="passwordStrengthText" class="form-text"></small>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Sahkan Kata Laluan</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control" placeholder="Sahkan kata laluan" style="height: 50px;" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password"
                            onclick="togglePassword('password_confirmation', this)"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div id="formError" class="alert alert-danger d-none" role="alert"></div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('pengguna') }}"
                        class="btn btn-outline-secondary d-inline-flex align-items-center me-md-2">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-johor">
                        <i class="fas fa-user-plus me-2"></i>Tambah Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer-johor">
        &copy; 2025 Sistem Kerajaan Johor. Hak cipta terpelihara.
    </footer>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Password strength checker
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrengthBar');
        const strengthText = document.getElementById('passwordStrengthText');

        passwordInput.addEventListener('input', function() {
            const val = passwordInput.value;
            const strength = calculatePasswordStrength(val);

            // Update progress bar width and color
            strengthBar.style.width = strength.percent + '%';
            strengthBar.className = 'progress-bar ' + strength.colorClass;

            // Update text
            strengthText.textContent = strength.message;
        });

        function calculatePasswordStrength(password) {
            let score = 0;

            if (!password) {
                return {
                    percent: 0,
                    message: '',
                    colorClass: ''
                };
            }

            // Length points
            if (password.length >= 8) score += 1;
            if (password.length >= 12) score += 1;

            // Contains lowercase
            if (/[a-z]/.test(password)) score += 1;

            // Contains uppercase
            if (/[A-Z]/.test(password)) score += 1;

            // Contains number
            if (/\d/.test(password)) score += 1;

            // Contains special char
            if (/[\W_]/.test(password)) score += 1;

            // Map score to percent and message
            const percent = (score / 6) * 100;

            let message = '';
            let colorClass = '';

            if (score <= 2) {
                message = 'Lemah';
                colorClass = 'bg-danger';
            } else if (score <= 4) {
                message = 'Sederhana';
                colorClass = 'bg-warning';
            } else {
                message = 'Kuat';
                colorClass = 'bg-success';
            }

            return {
                percent,
                message,
                colorClass
            };
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function hideLoadingOverlay() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.style.opacity = 0;
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 400);
            }
        }

        // Tunjukkan overlay semasa keluar dari halaman
        window.addEventListener('beforeunload', function() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.style.display = 'flex';
                overlay.style.opacity = 1;
            }
        });

        // Sembunyikan overlay selepas halaman siap dimuat (normal load)
        window.addEventListener('load', function() {
            setTimeout(hideLoadingOverlay, 800); // Overlay kekal 1.2s selepas load
        });

        // Sembunyikan overlay bila kembali ke halaman melalui butang “Back” (cache aktif)
        window.addEventListener('pageshow', function(event) {
            if (event.persisted || performance.getEntriesByType("navigation")[0]?.type === "back_forward") {
                hideLoadingOverlay();
            }
        });
    </script>

</body>

</html>
