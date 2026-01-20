<?php
session_start();
if (!isset($_SESSION['id_user'])) { 
    header("Location: login.php"); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasaaa Field | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --dark-blue: #0f172a;
            --accent-blue: #3b82f6;
        }
        body { 
            background-color: #ffffff; 
            font-family: 'Inter', sans-serif;
            color: var(--dark-blue);
        }

        /* Hero Banner Style */
        .hero-banner {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('https://images.unsplash.com/photo-1526232759583-d6f44d154bbf?q=80&w=2000&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            border-bottom: 5px solid #fbbf24;
        }

        /* Sport Category Cards */
        .sport-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            height: 280px;
            transition: 0.4s;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .sport-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }
        .sport-card:hover img {
            transform: scale(1.1);
        }
        .sport-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 20px;
            color: white;
            text-align: center;
        }
        .sport-overlay h4 {
            font-weight: 800;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
        }

        /* Navigation Buttons */
        .nav-pill-custom {
            background: #f1f5f9;
            border-radius: 50px;
            padding: 10px 20px;
            display: inline-flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        .nav-link-custom {
            text-decoration: none;
            color: #64748b;
            font-weight: 600;
            transition: 0.3s;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: var(--accent-blue);
        }

        .section-title {
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -5px; left: 0;
            width: 50%; height: 3px;
            background: #fbbf24;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">FASAAA<span class="text-primary">FIELD</span></a>
        <div class="d-flex align-items-center">
            <span class="me-3 d-none d-md-inline text-muted">Halo, <strong><?php echo $_SESSION['nama']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-4">Logout</a>
        </div>
    </div>
</nav>

<header class="hero-banner">
    <div class="container">
        <h1 class="display-4 fw-bold">SELAMAT DATANG DI FASAAA FIELD</h1>
        <p class="lead">Pilih Olahraga Favoritmu & Pesan Lapangannya Sekarang</p>
        <div class="mt-4">
            <a href="https://instagram.com/fasaaa_field" class="text-white fs-3 mx-2"><i class="bi bi-instagram"></i></a>
            <a href="https://wa.me/628123456789" class="text-white fs-3 mx-2"><i class="bi bi-whatsapp"></i></a>
        </div>
    </div>
</header>

<div class="container my-5">
    
    <div class="text-center">
        <div class="nav-pill-custom shadow-sm">
            <a href="#" class="nav-link-custom active">Beranda</a>
            <a href="data_booking.php" class="nav-link-custom">Riwayat Booking</a>
            <a href="http://maps.google.com" target="_blank" class="nav-link-custom">Lokasi Venue</a>
        </div>
    </div>

    <div class="text-center mb-5">
        <h2 class="section-title">BERBAGAI PILIHAN OLAHRAGA</h2>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-4">
            <a href="futsal.php" class="text-decoration-none">
                <div class="sport-card">
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=800&auto=format&fit=crop" alt="Futsal">
                    <div class="sport-overlay">
                        <h4>FUTSAL</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4">
            <a href="pilih_basket.php" class="text-decoration-none">
                <div class="sport-card">
                    <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop" alt="Basket">
                    <div class="sport-overlay">
                        <h4>BASKET</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4">
            <a href="pilih_badminton.php" class="text-decoration-none">
                <div class="sport-card">
                    <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?q=80&w=800&auto=format&fit=crop" alt="Badminton">
                    <div class="sport-overlay">
                        <h4>BADMINTON</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center p-4 bg-light rounded-4 border-start border-5 border-warning shadow-sm">
            <h5 class="fw-bold">Tentang Fasaaa Field</h5>
            <p class="text-muted mb-0">
                Kami menyediakan 3 jenis lapangan olahraga dengan kualitas internasional. 
                Dapatkan pengalaman booking termudah dengan <strong>30 pilihan paket</strong> spesial. 
                Operasional: <strong>10:00 - 22:00 WIB</strong>.
            </p>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4 text-center mt-5">
    <div class="container">
        <p class="mb-1 fw-bold">FASAAA FIELD MANAGEMENT SYSTEM</p>
        <p class="small opacity-50 mb-0">Copyright © 2026 **SALMA SALAMAH** - **23552011424** - TIF 23 RP CNS A_UASWEB1</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>