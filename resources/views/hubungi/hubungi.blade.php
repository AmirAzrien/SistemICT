<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://www.johor.gov.my/images/banner_johor.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 15px;
            margin-top: 5rem;
        }

        .johor-header {
            background: rgba(255, 255, 255, 0.98);
            border-bottom: 3px solid #003366;
        }

        .johor-logo {
            height: 60px;
            margin-right: 15px;
        }

        .btn-johor {
            color: #003366;
            font-weight: 500;
            padding: 8px 25px;
            border-radius: 8px;
        }

        .btn-johor:hover {
            background: white;
        }

        .btn-hantar {
            background: #24a0ed;
            color: #ffffff;
            font-weight: 500;
            padding: 8px 25px;
            border-radius: 8px;
        }

        .btn-hantar:hover {
            background: #107ed9;
            color: #ffffff;
        }

        .nav-link-johor {
            color: #003366 !important;
            font-weight: 500;
            border-bottom: 3px solid transparent;
        }

        .nav-link-johor.active {
            border-bottom-color: #003366;
        }

        .footer-johor {
            background: rgba(0, 51, 102, 0.9);
            color: #fff;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 3px solid #002244;
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

<body>

    {{-- loading overlay --}}
    <div id="loading-overlay" style="display: none;">
        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg johor-header shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://images.seeklogo.com/logo-png/30/1/kerajaan-negeri-johor-logo-png_seeklogo-306450.png"
                    alt="Jata Johor" class="johor-logo">
                <div>
                    <span class="d-block fw-bold">SISTEM PENTADBIRAN</span>
                    <small class="d-block text-muted">JOHOR DARUL TA'ZIM</small>
                </div>
            </a>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('dashboard.umum') }}">UTAMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('permohonan.index') }}">PERMOHONAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('maklumat') }}">MAKLUMAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor active" href="{{ route('hubungi.kami') }}">HUBUNGI KAMI</a>
                    </li>
                </ul>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown">
                <button class="btn btn-johor dropdown-toggle" type="button" data-bs-toggle="dropdown">
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
    <div class="container my-5">
        <div class="main-content p-4 p-md-5 shadow-lg">
            <h1 class="text-primary mb-4"><i class="bi bi-envelope me-2"></i>Hubungi Kami</h1>

            <div class="row g-4">
                <!-- Contact Information -->
                <div class="col-md-6">
                    <h3 class="mb-3">Maklumat Perhubungan</h3>
                    <div class="card border-primary">
                        <div class="card-body">
                            <p class="mb-2">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                Aras 1-5, Blok A, Kompleks Kota Iskandar,<br>
                                79505 Johor Bahru, Johor
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-telephone-fill me-2"></i>
                                +607-266 6666
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-envelope-fill me-2"></i>
                                webmaster@johor.gov.my
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6">
                    <h3 class="mb-3">Borang Hubungan</h3>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Penuh</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Emel</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <select class="form-select">
                                <option>Pilih Subjek</option>
                                <option>Aduan</option>
                                <option>Pertanyaan</option>
                                <option>Cadangan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mesej</label>
                            <textarea class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-hantar">
                            <i class="bi bi-send-fill me-2"></i>Hantar Mesej
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-johor">
        &copy; 2025 Sistem Kerajaan Johor. Hak cipta terpelihara.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add any custom JavaScript here
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Mesej anda telah dihantar.');
        });
    </script>
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
