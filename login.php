<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5; /* Abu-abu terang */
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            max-width: 950px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            margin: auto;
        }
        .side-image {
            /* Gambar Lapangan dengan Overlay Biru Denim */
            background: linear-gradient(rgba(44, 62, 80, 0.85), rgba(44, 62, 80, 0.85)), 
                        url('https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=1000'); 
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
        }
        .btn-denim {
            background-color: #2c3e50;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-denim:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container login-card">
    <div class="row g-0">
        <div class="col-md-6 side-image d-none d-md-flex">
            <div class="mb-4">
                <i class="fas fa-dumbbell fa-3x mb-3 text-info"></i>
                <h1 class="fw-bold">FASAAA FIELD</h1>
                <p class="lead">Solusi Manajemen Lapangan Olahraga Terintegrasi.</p>
            </div>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check-circle me-2 text-info"></i> Booking Basket, Futsal & Badminton</li>
                <li class="mb-2"><i class="fas fa-check-circle me-2 text-info"></i> Laporan Real-Time (Materi P14)</li>
                <li class="mb-2"><i class="fas fa-check-circle me-2 text-info"></i> Sistem Keamanan Session & Cookies</li>
            </ul>
        </div>

        <div class="col-md-6 p-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-dark">Selamat Datang</h3>
                <p class="text-muted">Silakan masuk untuk mengelola reservasi</p>
            </div>

            <form id="loginForm">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username Admin</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-user text-muted"></i></span>
                        <input type="text" id="username" class="form-control" placeholder="Contoh: admin" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-denim w-100 py-2 mb-3 shadow-sm">
                    LOGIN SEKARANG <i class="fas fa-sign-in-alt ms-2"></i>
                </button>
            </form>
            
            <div id="message" class="text-center mt-3"></div>
        </div>
    </div>
</div>

<script>
    // Fetch API Login sesuai materi Pertemuan 9 & 11
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const user = document.getElementById('username').value;
        const pass = document.getElementById('password').value;
        const msg = document.getElementById('message');

        msg.innerHTML = '<div class="spinner-border spinner-border-sm text-primary"></div> Mengecek...';

        try {
            const response = await fetch('api_login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `username=${encodeURIComponent(user)}&password=${encodeURIComponent(pass)}`
            });

            const result = await response.json();
            if (result.status === 'success') {
                msg.innerHTML = '<div class="alert alert-success py-2">Berhasil! Membuka Dashboard...</div>';
                setTimeout(() => window.location.href = 'dashboard.php', 1200);
            } else {
                msg.innerHTML = `<div class="alert alert-danger py-2">${result.message}</div>`;
            }
        } catch (error) {
            msg.innerHTML = '<div class="alert alert-danger py-2">Server Error! Periksa api_login.php</div>';
        }
    });
</script>

<div class="fixed-bottom text-center pb-3 small text-muted">
    <strong>@Copyright by 23552011424_SALMA SALAMAH_TIF 23 RP CNS A_UASWEB1</strong>
</div>

</body>
</html>