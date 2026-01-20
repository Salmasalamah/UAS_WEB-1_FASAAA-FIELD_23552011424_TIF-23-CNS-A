<?php
session_start();
// Pastikan admin sudah login
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Lapangan Futsal | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #2c3e50; }
        .card-lantai { border: none; border-radius: 15px; transition: 0.3s; background: white; height: 100%; overflow: hidden; }
        .card-lantai:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .img-lantai { height: 200px; object-fit: cover; width: 100%; border-bottom: 3px solid #eee; }
        .btn-pilih { background-color: #2c3e50; color: white; border-radius: 8px; width: 100%; font-weight: 600; }
        .btn-pilih:hover { background-color: #1a252f; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php"><i class="fas fa-chevron-left me-2"></i> Dashboard Admin</a>
    </div>
</nav>

<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #2c3e50;">Pilih Spesifikasi Lantai Futsal</h2>
        <p class="text-muted">Setiap jenis lantai memiliki keunggulan berbeda untuk kenyamanan pemain.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/kayu.png" class="img-lantai" alt="Kayu">
                <div class="card-body">
                    <h6 class="fw-bold">Lantai Kayu</h6>
                    <p class="small text-muted">Standar kompetisi, pantulan bola stabil, dan permukaan sangat halus.</p>
                    <a href="booking.php?lapangan=Futsal&lantai=Kayu" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/matras.png" class="img-lantai" alt="Matras">
                <div class="card-body">
                    <h6 class="fw-bold">Lantai Interlock</h6>
                    <p class="small text-muted">Bahan matras polipropilena, empuk di kaki, dan tidak licin saat lari.</p>
                    <a href="booking.php?lapangan=Futsal&lantai=Matras" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/semen_halus.png" class="img-lantai" alt="Semen">
                <div class="card-body">
                    <h6 class="fw-bold">Semen Halus</h6>
                    <p class="small text-muted">Lantai beton epoxy yang kuat, stabil untuk sprint, dan lebih ekonomis.</p>
                    <a href="booking.php?lapangan=Futsal&lantai=Semen" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/sintetis.png" class="img-lantai" alt="Sintetis">
                <div class="card-body">
                    <h6 class="fw-bold">Rumput Sintetis</h6>
                    <p class="small text-muted">Rumput buatan premium, sangat aman dari lecet, favorit komunitas.</p>
                    <a href="booking.php?lapangan=Futsal&lantai=Sintetis" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 py-4 border-top text-center text-muted">
        <p>@Copyright by 23552011424_SALMA SALAMAH_TIF 23 RP CNS A_UASWEB1</p>
    </footer>
</div>

</body>
</html>