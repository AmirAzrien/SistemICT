<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://www.johor.gov.my/images/banner_johor.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .johor-header {
            background: rgba(255, 255, 255, 0.98);
            border-bottom: 3px solid #003366;
        }

        .johor-logo {
            height: 60px;
            margin-right: 15px;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .nav-link-johor {
            color: #003366 !important;
            font-weight: 500;
            border-bottom: 3px solid transparent;
        }

        .nav-link-johor.active {
            border-bottom-color: #003366;
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
                        <a class="nav-link nav-link-johor active" href="{{ route('maklumat') }}">MAKLUMAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('hubungi.kami') }}">HUBUNGI KAMI</a>
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
            <h1 class="text-primary mb-4"><i class="bi bi-info-circle-fill me-2"></i>Maklumat Penting</h1>

            <div class="accordion" id="infoAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#info1">
                            <i class="bi bi-file-earmark-text me-2"></i>
                            Dasar Privasi
                        </button>
                    </h2>
                    <div id="info1" class="accordion-collapse collapse show" data-bs-parent="#infoAccordion">
                        <div class="accordion-body">
                            <p>Kerajaan Johor komited dalam melindungi maklumat peribadi pengguna sistem ini.</p>
                            <ul>
                                <li>Data hanya digunakan untuk tujuan rasmi</li>
                                <li>Maklumat tidak akan dikongsi dengan pihak ketiga</li>
                                <li>Pengguna boleh meminta kemaskini data melalui sistem</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#info2">
                            <i class="bi bi-calendar-check me-2"></i>
                            Waktu Operasi
                        </button>
                    </h2>
                    <div id="info2" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                        <div class="accordion-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                    </tr>
                                    <tr>
                                        <td>Isnin - Khamis</td>
                                        <td>8:00 PG - 5:00 PTG</td>
                                    </tr>
                                    <tr>
                                        <td>Jumaat</td>
                                        <td>8:00 PG - 12:15 PTG<br>2:45 PTG - 5:00 PTG</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#info3">
                            <i class="bi bi-shield-check me-2"></i>
                            Keselamatan Sistem
                        </button>
                    </h2>
                    <div id="info3" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                        <div class="accordion-body">
                            <p>Sistem ini menggunakan teknologi keselamatan terkini:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <i class="bi bi-lock-fill h3 text-primary"></i>
                                            <h5>Enkripsi SSL 256-bit</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <i class="bi bi-shield-fill-check h3 text-success"></i>
                                            <h5>Pengesahan 2-Faktor</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
