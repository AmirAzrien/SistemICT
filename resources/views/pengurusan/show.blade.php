<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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

<body class="d-flex flex-column min-vh-100">

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
                    <small class="tajuk-johor">JOHOR DARUL TA'ZIM</small>
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
                            <a class="nav-link nav-link-johor" href="{{ route('pengguna') }}">PENGGUNA</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link nav-link-johor" href="{{ route('permohonan.index') }}">PERMOHONAN</a>
                    </li>
                    @if (in_array(auth()->user()->type, [2, 3, 4]))
                        <li class="nav-item">
                            <a class="nav-link nav-link-johor" href="{{ route('pengurusan.index') }}">PENGURUSAN</a>
                        </li>
                    @endif
                </ul>
            </div>

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

    {{-- Notification --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berjaya!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <main class="container py-4" style="max-width: 900px; font-family: 'Inter', sans-serif;">
        <!-- Page Title -->
        <h1 class="mb-4 text-primary fw-bold border-bottom pb-2" style="font-size: 2rem; line-height: 1.3;">
            <i class="bi bi-journal-text me-2"></i> Maklumat Permohonan
        </h1>

        <!-- Project Details Card -->
        <section class="bg-white shadow-sm rounded-4 p-4 mb-4" style="box-shadow: 0 3px 15px rgba(0,0,0,0.05);">
            <h2 class="fw-semibold mb-3" style="font-size: 1.5rem; color: #0d6efd; line-height: 1.3;">
                <i class="bi bi-folder2-open me-2"></i> Butiran Projek
            </h2>

            <div class="mb-3">
                <h3 class="fw-semibold mb-1" style="font-size: 1.15rem; color: #212529;">Nama Projek</h3>
                <p class="text-truncate fs-6" style="max-width: 100%; line-height: 1.5;">
                    {{ $permohonan->tajuk }}
                </p>
            </div>

            <div class="row gy-3">
                <div class="col-md-6">
                    <h4 class="text-muted fw-semibold mb-1" style="font-size: 1rem;">
                        <i class="bi bi-calendar-event me-1 text-primary"></i> Tarikh Mohon
                    </h4>
                    <p class="fs-7" style="line-height: 1.4; color: #333;">
                        {{ $permohonan->created_at->format('d-m-Y') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <h4 class="text-muted fw-semibold mb-1" style="font-size: 1rem;">
                        <i class="bi bi-diagram-3 me-1 text-primary"></i> Skop Projek
                    </h4>
                    <p class="fs-7" style="line-height: 1.4; color: #333;">
                        {{ $permohonan->skop ?? 'Tiada maklumat' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <h4 class="text-muted fw-semibold mb-1" style="font-size: 1rem;">
                        <i class="bi bi-card-text me-1 text-primary"></i> No. Rujukan
                    </h4>
                    <p class="fs-7" style="line-height: 1.4; color: #333;">
                        {{ $permohonan->no_rujukan ?? 'Tiada maklumat' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <h4 class="text-muted fw-semibold mb-1" style="font-size: 1rem;">
                        <i class="bi bi-info-circle me-1 text-primary"></i> Keterangan
                    </h4>
                    <p class="fst-italic text-muted fs-7" style="line-height: 1.5;">
                        {{ $permohonan->keterangan ?? 'Tiada keterangan disediakan.' }}
                    </p>
                </div>

                @php
                    $dokumenNames = [
                        'Senarai Semak Permohonan Kelulusan Teknikal Projek Teknologi Maklumat dan Komunikasi (ICT) Kerajaan Negeri Johor',
                        'Borang Permohonan Kelulusan Teknikal Projek ICT',
                        'Cabutan Minit Mesyuarat JPICT Jabatan (berkenaan kelulusan permohonan projek)',
                        'Kertas Kerja Permohonan Kelulusan Teknikal Projek ICT',
                        'Slaid Permohonan Kelulusan Teknikal Projek ICT',
                    ];
                    $dokumenIcons = [
                        'bi bi-list-check', // Checklist icon
                        'bi bi-file-earmark-text', // Form icon
                        'bi bi-journal-text', // Minutes icon
                        'bi bi-file-earmark-richtext', // Paper icon
                        'bi bi-file-earmark-slides', // Slides icon
                    ];
                @endphp
                <div class="mt-4">
                    <h4 class="fw-semibold mb-2" style="font-size: 1.2rem; color: #0d6efd;">
                        <i class="bi bi-paperclip me-2"></i> Dokumen Dimuat Naik
                    </h4>
                    <ul class="list-group list-group-flush">
                        @php
                            $dokumens = [
                                $permohonan->dokumen1,
                                $permohonan->dokumen2,
                                $permohonan->dokumen3,
                                $permohonan->dokumen4,
                                $permohonan->dokumen5,
                            ];
                        @endphp

                        @forelse ($dokumens as $index => $file)
                            @if ($file)
                                <li class="list-group-item">
                                    {{-- <a href="{{ asset('storage/dokumen/' . $file) }}" target="_blank"
                                        class="text-decoration-none text-primary">
                                        {{ $dokumenNames[$index] }}
                                    </a> --}}
                                    <i class="{{ $dokumenIcons[$index] }} text-primary me-2 fs-5"></i>
                                    <a href="{{ asset('storage/dokumen/' . $file) }}" target="_blank"
                                        class="flex-grow-1 text-decoration-none text-dark fw-semibold">
                                        {{ $dokumenNames[$index] }}
                                    </a>
                                </li>
                                </li>
                            @endif
                        @empty
                            <li class="list-group-item text-muted fst-italic">Tiada dokumen dimuat naik.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </section>

        <!-- User Info and Status Section -->
        <section class="d-flex flex-column flex-md-row gap-3">
            <!-- User Info -->
            <div class="flex-fill bg-white shadow-sm rounded-4 p-3" style="box-shadow: 0 3px 15px rgba(0,0,0,0.05);">
                <h3 class="fw-semibold mb-4" style="color: #0dcaf0; font-size: 1.3rem;">
                    <i class="bi bi-person-circle me-2"></i> Maklumat Pemohon
                </h3>
                <p class="mb-3" style="font-size: 1rem; color: #222;">
                    <strong><i class="bi bi-person me-1 text-info"></i> Nama:</strong>
                    {{ $permohonan->name }}
                </p>
                <p style="font-size: 1rem; color: #222;">
                    <strong><i class="bi bi-card-heading me-1 text-info"></i> ID:</strong>
                    {{ $permohonan->id_pekerja }}
                </p>
                <p style="font-size: 1rem; color: #222;">
                    <strong><i class="bi bi-telephone-fill me-1 text-info"></i> No Telefon:</strong>
                    {{ $permohonan->notel }}
                </p>
            </div>

            <!-- Status Semasa -->
            <div class="flex-fill bg-white shadow-sm rounded-4 p-3" style="box-shadow: 0 3px 15px rgba(0,0,0,0.05);">
                <h3 class="fw-semibold mb-4" style="color: #198754; font-size: 1.3rem;">
                    <i class="bi bi-clipboard-check me-2"></i> Status Semasa
                </h3>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="fw-semibold" style="font-size: 1rem;">
                        <i class="bi bi-info-circle me-1 text-success"></i> Status Terkini:
                    </span>
                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-semibold fs-6"
                        style="letter-spacing: 0.02em;">
                        {{ $permohonan->status_sekretariat }}
                    </span>
                </div>

                <form action="{{ url('/pengurusan/permohonan/' . $permohonan->id . '/status') }}" method="POST">
                    @csrf
                    <label for="statusSekretariat" class="form-label fw-semibold mb-2" style="font-size: 1rem;">
                        <i class="bi bi-pencil-square me-1 text-success"></i> Kemaskini Status
                    </label>
                    <select id="statusSekretariat" name="status_sekretariat" class="form-select mb-3 fs-6" required
                        style="border-color: #0d6efd; box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);">
                        <option value="Menunggu"
                            {{ $permohonan->status_sekretariat == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Lengkap" {{ $permohonan->status_sekretariat == 'Lengkap' ? 'selected' : '' }}>
                            Lengkap</option>
                        <option value="Tidak Lengkap"
                            {{ $permohonan->status_sekretariat == 'Tidak Lengkap' ? 'selected' : '' }}>Tidak Lengkap
                        </option>
                        <option value="Perlu Semakan Semula"
                            {{ $permohonan->status_sekretariat == 'Perlu Semakan Semula' ? 'selected' : '' }}>Perlu
                            Semakan Semula</option>
                        <option value="Disyorkan"
                            {{ $permohonan->status_sekretariat == 'Disyorkan' ? 'selected' : '' }}>Disyorkan</option>
                    </select>
                    <button type="submit" class="btn btn-success w-100 fw-semibold fs-6">
                        <i class="bi bi-arrow-repeat me-2"></i> Kemaskini Status
                    </button>
                </form>
            </div>
        </section>

        <!-- Back Button -->
        <div class="mt-4 text-end">
            <a href="{{ route('pengurusan.index') }}" class="btn btn-outline-secondary btn-lg fw-semibold px-4 fs-6">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Senarai
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-johor mt-auto">
        &copy; 2025 Sistem Kerajaan Johor. Hak cipta terpelihara.
    </footer>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Example: Handle form submission
        document.getElementById('statusUpdateForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const status = document.getElementById('statusSekretariat').value;
            alert('Status Sekretariat dikemaskini kepada: ' + status);
            // Here you can add AJAX to submit to server if needed
        });
    </script>
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
    <script>
        // Bootstrap 5 form validation example
        (() => {
            'use strict';
            const form = document.getElementById('statusUpdateForm');
            form.addEventListener('submit', e => {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                } else {
                    e.preventDefault();
                    alert('Status Sekretariat dikemaskini kepada: ' + form.statusSekretariat.value);
                    // TODO: AJAX submit here
                }
                form.classList.add('was-validated');
            });
        })();
    </script>

</body>

</html>
