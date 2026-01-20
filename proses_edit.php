<?php
include "koneksi.php";

// Ambil data dari form edit
$id      = $_POST['id_booking'];
$nama    = $_POST['nama_pemesan'];
$paket   = $_POST['paket'];
$tgl     = $_POST['tanggal_booking'];
$durasi  = $_POST['durasi'];
$total   = $_POST['total_harga'];

// Perintah SQL Update
$sql = "UPDATE bookings SET 
        nama_pemesan = '$nama', 
        paket = '$paket', 
        tanggal_booking = '$tgl', 
        durasi = '$durasi', 
        total_harga = '$total' 
        WHERE id_booking = '$id'";

$query = mysqli_query($conn, $sql);

if($query) {
    // Jika berhasil, balik lagi ke halaman riwayat
    echo "<script>alert('Data berhasil diperbarui!'); window.location='data_booking.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>