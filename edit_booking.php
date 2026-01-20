<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['id_user'])) { header("Location: login.php"); exit(); }

// Ambil ID dari tombol edit yang diklik
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM bookings WHERE id_booking = '$id'");
$data = mysqli_fetch_array($query);

// Jika data tidak ketemu
if (!$data) { echo "Data tidak ditemukan!"; exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Reservasi | Fasaaa Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card-edit { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-edit p-4">
                <h4 class="fw-bold mb-4 text-center">Edit Data Reservasi</h4>
                
                <form action="proses_edit.php" method="POST">
                    <input type="hidden" name="id_booking" value="<?php echo $data['id_booking']; ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" value="<?php echo $data['nama_pemesan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Paket</label>
                        <select name="paket" class="form-select">
                            <option value="Paket Basic Wasit" <?php if($data['paket'] == 'Paket Basic Wasit') echo 'selected'; ?>>Paket Basic Wasit</option>
                            <option value="Paket Premium Wasit" <?php if($data['paket'] == 'Paket Premium Wasit') echo 'selected'; ?>>Paket Premium Wasit</option>
                            <option value="Paket Sparing + Wasit" <?php if($data['paket'] == 'Paket Sparing + Wasit') echo 'selected'; ?>>Paket Sparing + Wasit</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="tanggal_booking" class="form-control" value="<?php echo $data['tanggal_booking']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label fw-bold">Durasi (Jam)</label>
                            <input type="number" name="durasi" class="form-control" value="<?php echo $data['durasi']; ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-success">Total Harga Baru</label>
                        <input type="number" name="total_harga" class="form-control fw-bold" value="<?php echo $data['total_harga']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2 text-white">Update Simpan</button>
                    <a href="data_booking.php" class="btn btn-light w-100 border">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>