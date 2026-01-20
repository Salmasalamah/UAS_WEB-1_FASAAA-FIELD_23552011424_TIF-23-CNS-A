<?php
session_start();
// Pastikan admin sudah login
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Lapangan Basket | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff5e6; }
        .navbar { background-color: #ff8c00; } /* Warna Oranye Basket */
        .card-lantai { border: none; border-radius: 15px; transition: 0.3s; background: white; height: 100%; overflow: hidden; }
        .card-lantai:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(255, 140, 0, 0.2); }
        .img-lantai { height: 200px; object-fit: cover; width: 100%; border-bottom: 3px solid #ff8c00; }
        .btn-pilih { background-color: #ff8c00; color: white; border-radius: 8px; width: 100%; font-weight: 600; border: none; }
        .btn-pilih:hover { background-color: #e67e00; color: white; }
        .text-header { color: #ff4500; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php"><i class="fas fa-chevron-left me-2"></i> Dashboard Admin</a>
    </div>
</nav>

<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-header">Pilih Spesifikasi Lapangan Basket</h2>
        <p class="text-muted">Pilih tipe lapangan yang sesuai dengan kebutuhan latihan atau pertandingan tim kamu.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/indor_kayu.png" class="img-lantai" alt="Indoor Kayu">
                <div class="card-body">
                    <h6 class="fw-bold">Indoor Kayu Parket</h6>
                    <p class="small text-muted">Lantai kayu standar profesional, pantulan bola sempurna, indoor full AC.</p>
                    <a href="basket.php?lapangan=Basket&lantai=Indoor+Kayu" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/outdor_semen.png" class="img-lantai" alt="Outdoor Semen">
                <div class="card-body">
                    <h6 class="fw-bold">Outdoor Flexi Court</h6>
                    <p class="small text-muted">Permukaan semen halus dengan cat khusus, cocok untuk main sore hari.</p>
                    <a href="basket.php?lapangan=Basket&lantai=Outdoor+Semen" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/full_Court.png" class="img-lantai" alt="Full Court">
                <div class="card-body">
                    <h6 class="fw-bold">Full Court Standard</h6>
                    <p class="small text-muted">Lapangan ukuran penuh (2 ring) untuk pertandingan resmi 5 lawan 5.</p>
                    <a href="basket.php?lapangan=Basket&lantai=Full+Court" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/mini_basket.png" class="img-lantai" alt="Mini Basket">
                <div class="card-body">
                    <h6 class="fw-bold">Half Court / 3x3</h6>
                    <p class="small text-muted">Lapangan setengah ukuran, pas untuk latihan shooting atau game 3x3.</p>
                    <a href="basket.php?lapangan=Basket&lantai=Half+Court" class="btn btn-sm btn-pilih mt-2">Pilih & Booking</a>
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