<?php
session_start();
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Spesifikasi Badminton | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f7ff; }
        .navbar { background-color: #4f46e5; }
        .card-lantai { border: none; border-radius: 15px; transition: 0.3s; background: white; height: 100%; overflow: hidden; }
        .card-lantai:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2); }
        .img-lantai { height: 180px; object-fit: cover; width: 100%; border-bottom: 3px solid #4f46e5; }
        .btn-pilih { background-color: #4f46e5; color: white; border-radius: 8px; width: 100%; font-weight: 600; border: none; }
        .btn-pilih:hover { background-color: #3730a3; color: white; }
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
        <h2 class="fw-bold" style="color: #4f46e5;">PILIH LANTAI BADMINTON</h2>
        <p class="text-muted">Gunakan sepatu badminton terbaikmu untuk spesifikasi lantai di bawah ini.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/indoor_kayu.png" class="img-lantai" alt="Kayu">
                <div class="card-body">
                    <h6 class="fw-bold">Indoor Kayu Parket</h6>
                    <p class="small text-muted">Lantai kayu solid, empuk untuk sendi, dan standar nasional.</p>
                    <a href="badminton.php?lantai=Indoor+Kayu&img=indoor_kayu.png" class="btn btn-sm btn-pilih mt-2">Pilih</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/outdoor_semen.png" class="img-lantai" alt="Semen">
                <div class="card-body">
                    <h6 class="fw-bold">Outdoor Semen Flexi</h6>
                    <p class="small text-muted">Permukaan rata dan kuat, cocok untuk bermain santai di sore hari.</p>
                    <a href="badminton.php?lantai=Outdoor+Semen&img=outdoor_semen.png" class="btn btn-sm btn-pilih mt-2">Pilih</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/Sintetis_Rubber.png" class="img-lantai" alt="Rubber">
                <div class="card-body">
                    <h6 class="fw-bold">Sintetis Rubber</h6>
                    <p class="small text-muted">Karpet karet profesional (vinyl), daya cengkeram sangat tinggi.</p>
                    <a href="badminton.php?lantai=Sintetis+Rubber&img=Sintetis_Rubber.png" class="btn btn-sm btn-pilih mt-2">Pilih</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-lantai shadow-sm">
                <img src="assets/Multifungsi_2.png" class="img-lantai" alt="Multifungsi">
                <div class="card-body">
                    <h6 class="fw-bold">Multifungsi Court</h6>
                    <p class="small text-muted">Lantai serbaguna yang fleksibel untuk berbagai latihan fisik.</p>
                    <a href="badminton.php?lantai=Multifungsi&img=Multifungsi_2.png" class="btn btn-sm btn-pilih mt-2">Pilih</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>