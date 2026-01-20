<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Basket | Fasaaa Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff5e6; }
        .card-custom { border: none; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header-basket { background: linear-gradient(45deg, #ff8c00, #ff4500); color: white; padding: 30px; }
        .img-preview { width: 100%; height: 200px; object-fit: cover; border-radius: 15px; margin-bottom: 15px; border: 3px solid #ff8c00; }
        .desc-box { background: #fff; padding: 15px; border-radius: 10px; border-left: 5px solid #ff8c00; font-size: 0.9rem; }
        .btn-basket { background: #ff8c00; color: white; border: none; padding: 12px; font-weight: 600; }
        .btn-basket:hover { background: #e67e00; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom">
                <div class="header-basket text-center">
                    <h2 class="fw-bold mb-0">RESERVASI BASKETBALL</h2>
                    <p class="mb-0">Pilih lapangan favoritmu dan mulai bertanding!</p>
                </div>
                
                <div class="card-body p-4 p-md-5 bg-white">
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <h5 class="fw-bold mb-3">Preview Lapangan</h5>
                            <img src="assets/multifungsi.png" id="lapangan_img" class="img-preview" alt="Preview">
                            
                            <div class="desc-box">
                                <h6 class="fw-bold" id="lapangan_title">Tipe Lapangan</h6>
                                <p class="mb-0" id="lapangan_desc">Pilih paket untuk melihat detail fasilitas lapangan.</p>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <form id="formBasket">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Pemesan / Tim</label>
                                    <input type="text" id="nama_pemesan" class="form-control" placeholder="Contoh: Satria Muda" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Pilih Paket & Tipe Lapangan</label>
                                    <select id="paket" class="form-select" onchange="updateInfo()" required>
                                        <option value="">-- Pilih Paket --</option>
                                        <option value="Basket Indoor" data-harga="300000" data-img="indor_kayu.png" data-desc="Lantai kayu parket standar internasional, nyaman untuk lutut dan anti licin. Full indoor dengan lampu LED.">Paket Basket Indoor (Kayu) - Rp 300rb</option>
                                        <option value="Basket Outdoor" data-harga="200000" data-img="outdor_semen.png" data-desc="Lapangan outdoor semen dengan cat khusus (flexy court). Cocok untuk main sore hari bersama teman.">Paket Basket Outdoor (Semen) - Rp 200rb</option>
                                        <option value="Full Court" data-harga="260000" data-img="full_Court.png" data-desc="Lapangan full size dengan 2 ring. Cocok untuk pertandingan 5v5 atau latihan taktik tim.">Paket Full Court Standard - Rp 260rb</option>
                                        <option value="Half Court" data-harga="170000" data-img="mini_basket.png" data-desc="Lapangan setengah ukuran dengan 1 ring. Ideal untuk latihan shooting atau 3v3 ringan.">Paket Half Court / Mini - Rp 170rb</option>
                                        <option value="Multifungsi" data-harga="150000" data-img="multifungsi.png" data-desc="Lapangan serbaguna yang bisa digunakan untuk basket atau olahraga lain. Harga paling ekonomis!">Paket Basket Multifungsi - Rp 150rb</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bold">Tanggal</label>
                                        <input type="date" id="tanggal" class="form-control" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bold">Waktu</label>
                                        <input type="time" id="jam" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Durasi Main (Jam)</label>
                                    <input type="number" id="durasi" class="form-control" value="1" min="1" oninput="updateInfo()">
                                </div>

                                <div class="p-3 mb-4 rounded border text-center" style="background: #fff8f0;">
                                    <span class="text-muted d-block small">Total Pembayaran</span>
                                    <h2 class="fw-bold mb-0" id="display_total" style="color: #ff4500;">Rp 0</h2>
                                    <input type="hidden" id="total_harga_input">
                                </div>

                                <button type="button" onclick="simpanBasket()" class="btn btn-basket w-100 mb-2">KONFIRMASI BOOKING</button>
                                <a href="dashboard.php" class="btn btn-light w-100 border text-muted">Batal & Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateInfo() {
    const paket = document.getElementById('paket');
    const selected = paket.options[paket.selectedIndex];
    
    if(selected.value !== "") {
        const harga = selected.getAttribute('data-harga');
        const img = selected.getAttribute('data-img');
        const desc = selected.getAttribute('data-desc');
        const durasi = document.getElementById('durasi').value;

        document.getElementById('lapangan_img').src = "assets/" + img;
        document.getElementById('lapangan_title').innerText = selected.value;
        document.getElementById('lapangan_desc').innerText = desc;

        const total = harga * durasi;
        document.getElementById('display_total').innerText = "Rp " + total.toLocaleString('id-ID');
        document.getElementById('total_harga_input').value = total;
    }
}

function simpanBasket() {
    if(!document.getElementById('nama_pemesan').value || !document.getElementById('paket').value || !document.getElementById('tanggal').value) {
        alert('Lengkapi data dulu ya Salma!'); return;
    }

    const formData = new FormData();
    // DISESUAIKAN DENGAN NAMA DI api_simpan_booking.php
    formData.append('nama_pemesan', document.getElementById('nama_pemesan').value);
    formData.append('lapangan', 'Basket'); 
    formData.append('paket', document.getElementById('paket').value);
    formData.append('tanggal', document.getElementById('tanggal').value);
    formData.append('jam', document.getElementById('jam').value);
    formData.append('durasi', document.getElementById('durasi').value);
    formData.append('total', document.getElementById('total_harga_input').value);

    fetch('api_simpan_booking.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Mantap! Reservasi Basket Berhasil.');
            window.location.href = 'data_booking.php';
        } else { 
            alert('Error: ' + data.message); 
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan sistem.');
    });
}
</script>
</body>
</html>