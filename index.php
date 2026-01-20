<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasaaa Field | Booking Lapangan Olahraga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), 
                        url('https://images.unsplash.com/photo-1515523110800-9415d13b84a8?q=80&w=1500'); /* Gambar Sport Center */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .navbar { background: rgba(44, 62, 80, 0.9) !important; }
        
        .card-sport {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-sport:hover { transform: translateY(-10px); }
        
        .btn-denim { background-color: #2c3e50; color: white; border-radius: 25px; padding: 10px 30px; }
        .btn-denim:hover { background-color: #34495e; color: white; }
        
        #services { background-color: #f8f9fa; padding: 80px 0; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fas fa-volleyball-ball me-2"></i>FASAAA FIELD</a>
            <div class="ms-auto">
                <a href="login.php" class="btn btn-outline-light btn-sm"><i class="fas fa-user-lock me-1"></i> Admin Login</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Main Lebih Seru di <span class="text-info">Fasaaa Field</span></h1>
            <p class="lead mb-4">Penyewaan Lapangan Basket, Futsal, dan Badminton Terbaik di Kota Ini.</p>
            <a href="#services" class="btn btn-denim btn-lg shadow">Lihat Lapangan</a>
        </div>
    </header>

    <section id="services">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Pilih Arena Olahraga</h2>
                <p class="text-muted">Fasilitas internasional untuk performa maksimal kamu.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-sport">
                        <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=500" class="card-img-top" alt="Basket">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">BASKETBALL</h5>
                            <p class="small text-muted">Lantai kayu standar kompetisi.</p>
                            <a href="login.php" class="btn btn-sm btn-outline-primary">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-sport">
                        <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=500" class="card-img-top" alt="Futsal">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">FUTSAL</h5>
                            <p class="small text-muted">Rumput sintetis kualitas tinggi.</p>
                            <a href="login.php" class="btn btn-sm btn-outline-primary">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-sport">
                        <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?q=80&w=500" class="card-img-top" alt="Badminton">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">BADMINTON</h5>
                            <p class="small text-muted">Karpet lapangan anti-slip.</p>
                            <a href="login.php" class="btn btn-sm btn-outline-primary">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">@Copyright by 23552011424_SALMA SALAMAH_TIF 23 RP CNS A_UASWEB1</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>