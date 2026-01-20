<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }

$lantai_pilihan = isset($_GET['lantai']) ? $_GET['lantai'] : 'Standard';
$img_pilihan = isset($_GET['img']) ? $_GET['img'] : 'indoor_kayu.png';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Badminton | Fasaaa Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f7ff; }
        .card-custom { border: none; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header-badminton { background: linear-gradient(45deg, #4f46e5, #06b6d4); color: white; padding: 25px; }
        .img-preview { width: 100%; height: 180px; object-fit: cover; border-radius: 15px; border: 3px solid #4f46e5; }
        .btn-simpan { background-color: #4f46e5; color: white; font-weight: 600; border: none; padding: 12px; }
        .btn-simpan:hover { background-color: #3730a3; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom">
                <div class="header-badminton text-center">
                    <h2 class="fw-bold mb-0">RESERVASI BADMINTON</h2>
                    <p class="mb-0">Pilihan Lantai: <?php echo $lantai_pilihan; ?></p>
                </div>
                <div class="card-body p-4 bg-white">
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <h6 class="fw-bold">Preview Lapangan</h6>
                            <img src="assets/<?php echo $img_pilihan; ?>" class="img-preview mb-3">
                            <div class="alert alert-info small">
                                <strong>Fasilitas Terpilih:</strong><br>
                                Lapangan <?php echo $lantai_pilihan; ?>, Net Standar, Kursi Wasit, dan Ruang Tunggu.
                            </div>
                            <a href="pilih_badminton.php" class="btn btn-outline-secondary btn-sm w-100">Ganti Tipe Lantai</a>
                        </div>
                        <div class="col-md-7">
                            <form id="formBadminton">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Pemesan</label>
                                    <input type="text" id="nama_pemesan" class="form-control" placeholder="Nama Anda / Tim" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Pilih Paket</label>
                                    <select id="paket" class="form-select" onchange="updateHarga()" required>
                                        <option value="">-- Pilih Paket Badminton --</option>
                                        <option value="Badminton Basic" data-harga="80000">1. Paket Basic (Rp 80.000)</option>
                                        <option value="Badminton Hemat" data-harga="100000">2. Paket Hemat (Rp 100.000)</option>
                                        <option value="Badminton Standard" data-harga="130000">3. Paket Standard (Rp 130.000)</option>
                                        <option value="Badminton Premium" data-harga="160000">4. Paket Premium (Rp 160.000)</option>
                                        <option value="Badminton Indoor" data-harga="180000">5. Paket Indoor (Rp 180.000)</option>
                                        <option value="Badminton Outdoor" data-harga="90000">6. Paket Outdoor (Rp 90.000)</option>
                                        <option value="Badminton Ganda" data-harga="150000">7. Paket Ganda (Rp 150.000)</option>
                                        <option value="Badminton Latihan" data-harga="120000">8. Paket Latihan (Rp 120.000)</option>
                                        <option value="Mini Turnamen" data-harga="250000">9. Paket Mini Turnamen (Rp 250.000)</option>
                                        <option value="Event Badminton" data-harga="350000">10. Paket Event (Rp 350.000)</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bold">Tanggal</label>
                                        <input type="date" id="tanggal" class="form-control" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bold">Waktu (Jam)</label>
                                        <input type="time" id="jam" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Durasi (Jam)</label>
                                    <input type="number" id="durasi" class="form-control" value="1" min="1" onchange="updateHarga()">
                                </div>

                                <div class="p-3 mb-4 rounded border text-center" style="background: #eef2ff;">
                                    <span class="text-muted d-block small">Total Pembayaran</span>
                                    <h2 class="fw-bold mb-0 text-primary" id="display_total">Rp 0</h2>
                                    <input type="hidden" id="total_harga_input">
                                </div>
                                
                                <button type="button" onclick="simpanBadminton()" class="btn btn-simpan w-100">KONFIRMASI BOOKING</button>
                                <a href="dashboard.php" class="btn btn-link w-100 text-muted mt-2">Kembali ke Dashboard</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateHarga() {
    const paket = document.getElementById('paket');
    const harga = paket.options[paket.selectedIndex].getAttribute('data-harga') || 0;
    const durasi = document.getElementById('durasi').value;
    const total = harga * durasi;
    document.getElementById('display_total').innerText = "Rp " + total.toLocaleString('id-ID');
    document.getElementById('total_harga_input').value = total;
}

function simpanBadminton() {
    // Validasi input
    if(!document.getElementById('nama_pemesan').value || !document.getElementById('paket').value || !document.getElementById('tanggal').value) {
        alert('Tolong isi semua data dulu ya!');
        return;
    }

    const formData = new FormData();
    formData.append('nama_pemesan', document.getElementById('nama_pemesan').value);
    formData.append('lapangan', 'Badminton');
    formData.append('paket', document.getElementById('paket').value + ' (<?php echo $lantai_pilihan; ?>)');
    formData.append('tanggal', document.getElementById('tanggal').value);
    formData.append('jam', document.getElementById('jam').value);
    formData.append('durasi', document.getElementById('durasi').value);
    formData.append('total', document.getElementById('total_harga_input').value);

    // Fetch mengarah ke nama file API Salma
    fetch('api_simpan_booking.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Mantap! Booking Badminton Berhasil.');
            window.location.href = 'data_booking.php';
        } else {
            alert('Gagal: ' + data.message);
        }
    })
    .catch(err => {
        alert('Terjadi kesalahan koneksi ke server.');
        console.error(err);
    });
}
</script>
</body>
</html>