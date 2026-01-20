<?php
session_start();
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }

$lapangan_dipilih = isset($_GET['lapangan']) ? $_GET['lapangan'] : 'Futsal';
$lantai_dipilih = isset($_GET['lantai']) ? $_GET['lantai'] : 'Matras';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Futsal | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; font-size: 0.85rem; }
        
        /* Header Identik Basket tapi warna Biru */
        .header-section { 
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); 
            color: white; 
            padding: 15px 0; 
            text-align: center; 
            border-bottom: 4px solid #00d4ff;
            margin-bottom: 25px;
        }
        .header-section h3 { font-weight: 800; margin: 0; letter-spacing: 1px; font-size: 1.4rem; }
        
        .card-main { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: white; padding: 20px; }
        
        /* Preview Image Style */
        .preview-container { border: 2px solid #1e3c72; border-radius: 12px; overflow: hidden; margin-bottom: 15px; }
        .preview-img { width: 100%; height: 180px; object-fit: cover; }
        
        .label-custom { font-weight: 600; color: #2c3e50; margin-bottom: 3px; display: block; }
        .form-control, .form-select { border-radius: 8px; font-size: 0.85rem; padding: 7px 12px; border: 1px solid #ddd; }
        
        /* Info Box */
        .info-tipe { border-left: 4px solid #1e3c72; background: #f0f4f8; padding: 10px; border-radius: 0 8px 8px 0; margin-top: 15px; }
        
        /* Total Section Identik Basket */
        .total-container { 
            background: #fdfdfd; 
            border: 1px solid #eee; 
            border-radius: 10px; 
            padding: 15px; 
            text-align: center;
            margin-top: 15px;
        }
        .total-label { font-size: 0.75rem; color: #888; font-weight: bold; text-transform: uppercase; }
        .total-price { font-size: 1.6rem; font-weight: 800; color: #1e3c72; margin: 0; }

        .btn-booking { 
            background: #1e3c72; 
            color: white; 
            border: none; 
            width: 100%; 
            padding: 12px; 
            border-radius: 10px; 
            font-weight: bold; 
            margin-top: 15px;
            transition: 0.3s;
        }
        .btn-booking:hover { background: #2a5298; transform: translateY(-2px); color: white; }
    </style>
</head>
<body>

<div class="header-section">
    <div class="container">
        <h3>RESERVASI FUTSAL</h3>
        <p class="m-0 small">Pilih paket terbaik untuk pertandingan tim kamu!</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-main">
                <div class="row g-4">
                    
                    <div class="col-md-5">
                        <label class="label-custom">Preview Lapangan</label>
                        <div class="preview-container">
                            <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&q=80&w=600" class="preview-img" alt="Futsal">
                        </div>
                        
                        <div class="info-tipe">
                            <span class="label-custom" style="font-size: 0.8rem;">Spesifikasi Lapangan</span>
                            <p class="m-0 small text-muted">Lantai: <strong><?php echo $lantai_dipilih; ?></strong></p>
                            <p class="m-0 mt-1 small text-muted" id="detail_paket_teks">Pilih paket untuk melihat fasilitas.</p>
                        </div>

                        <a href="futsal.php" class="btn btn-outline-secondary btn-sm w-100 mt-3 rounded-pill">
                            <i class="fas fa-arrow-left me-1"></i> Ganti Lapangan
                        </a>
                    </div>

                    <div class="col-md-7">
                        <form id="formBooking">
                            <div class="mb-2">
                                <label class="label-custom">Nama Pemesan / Tim</label>
                                <input type="text" id="nama_pemesan" class="form-control" placeholder="Contoh: FC Salma" required>
                            </div>

                            <div class="mb-2">
                                <label class="label-custom">Pilih Paket & Tipe Lapangan</label>
                                <select id="paket" class="form-select" required onchange="hitungTotal()">
                                    <option value="" disabled selected>-- Pilih Paket --</option>
                                    <option value="Paket Basic Wasit" data-harga="100000" data-info="Sewa lapangan + 1 Bola + 1 Wasit">1. Paket Basic Wasit (100rb)</option>
                                    <option value="Paket Hemat Wasit" data-harga="120000" data-info="Sewa lapangan + Bola + Mineral + 1 Wasit">2. Paket Hemat Wasit (120rb)</option>
                                    <option value="Paket Standard Wasit" data-harga="150000" data-info="Sewa lapangan + Lampu + Ganti + 1 Wasit">3. Paket Standard Wasit (150rb)</option>
                                    <option value="Paket Premium Wasit" data-harga="200000" data-info="Sewa lapangan + Shower + 2 Bola + 1 Wasit">4. Paket Premium Wasit (200rb)</option>
                                    <option value="Paket Malam Wasit" data-harga="175000" data-info="Sewa lapangan + Full Lampu + 1 Wasit">5. Paket Malam Wasit (175rb)</option>
                                    <option value="Paket Latihan Tim" data-harga="130000" data-info="Sewa lapangan + Rompi + Cone + 1 Wasit">6. Paket Latihan Tim (130rb)</option>
                                    <option value="Paket Sparing" data-harga="250000" data-info="Sewa lapangan + Papan Skor + 2 Wasit">7. Paket Sparing (250rb)</option>
                                    <option value="Paket Komunitas" data-harga="160000" data-info="Sewa lapangan + Member Card + 1 Wasit">8. Paket Komunitas (160rb)</option>
                                    <option value="Paket Event Mini" data-harga="300000" data-info="Sewa lapangan + Sound + Skor + 2 Wasit">9. Paket Event Mini (300rb)</option>
                                    <option value="Paket Turnamen" data-harga="500000" data-info="Fasilitas Lengkap + Piala + 2 Wasit">10. Paket Turnamen (500rb)</option>
                                </select>
                            </div>

                            <div class="row g-2">
                                <div class="col-6 mb-2">
                                    <label class="label-custom">Tanggal</label>
                                    <input type="date" id="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="label-custom">Waktu</label>
                                    <input type="time" id="jam" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="label-custom">Durasi Main (Jam)</label>
                                <input type="number" id="durasi" class="form-control" min="1" value="1" oninput="hitungTotal()" required>
                            </div>

                            <div class="total-container">
                                <span class="total-label">Total Pembayaran</span>
                                <p class="total-price">Rp <span id="display_total">0</span></p>
                                <input type="hidden" id="total_harga" value="0">
                            </div>

                            <button type="submit" id="btnSimpan" class="btn btn-booking">
                                SIMPAN RESERVASI <i class="fas fa-save ms-1"></i>
                            </button>
                        </form>
                        <div id="statusMessage" class="mt-2 text-center small"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungTotal() {
        const sel = document.getElementById('paket');
        const opt = sel.options[sel.selectedIndex];
        
        const hargaPerJam = parseInt(opt.getAttribute('data-harga')) || 0;
        const info = opt.getAttribute('data-info') || "Pilih paket untuk detail.";
        const durasi = document.getElementById('durasi').value || 1;
        
        const total = hargaPerJam * durasi;
        
        document.getElementById('detail_paket_teks').innerText = info;
        document.getElementById('total_harga').value = total;
        document.getElementById('display_total').innerText = total.toLocaleString('id-ID');
    }

    document.getElementById('formBooking').addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = document.getElementById('btnSimpan');
        const msg = document.getElementById('statusMessage');
        
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

        const payload = new URLSearchParams();
        payload.append('nama_pemesan', document.getElementById('nama_pemesan').value);
        payload.append('lapangan', 'Futsal'); 
        payload.append('paket', document.getElementById('paket').value + " (<?php echo $lantai_dipilih; ?>)");
        payload.append('tanggal', document.getElementById('tanggal').value);
        payload.append('jam', document.getElementById('jam').value);
        payload.append('durasi', document.getElementById('durasi').value);
        payload.append('total', document.getElementById('total_harga').value);

        try {
            const response = await fetch('api_simpan_booking.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: payload
            });

            // Perbaikan error JSON (Unexpected token <)
            const text = await response.text();
            try {
                const result = JSON.parse(text);
                if(result.status === 'success') {
                    msg.innerHTML = '<span class="text-success fw-bold"><i class="fas fa-check-circle"></i> Berhasil! Mengalihkan...</span>';
                    setTimeout(() => window.location.href = 'data_booking.php', 1200);
                } else {
                    msg.innerHTML = `<span class="text-danger">${result.message}</span>`;
                    btn.disabled = false;
                    btn.innerHTML = 'SIMPAN RESERVASI';
                }
            } catch (err) {
                msg.innerHTML = `<div class="alert alert-warning p-1" style="font-size:10px">Server Error: ${text}</div>`;
                btn.disabled = false;
                btn.innerHTML = 'SIMPAN RESERVASI';
            }
        } catch (error) {
            msg.innerHTML = '<span class="text-danger">Koneksi Gagal!</span>';
            btn.disabled = false;
        }
    });
</script>
</body>
</html>