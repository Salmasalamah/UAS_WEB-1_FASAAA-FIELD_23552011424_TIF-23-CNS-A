<?php
error_reporting(0);
header('Content-Type: application/json');
include "koneksi.php";
session_start();

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi gagal']);
    exit;
}

// Ambil data dari POST
$id_user      = $_SESSION['id_user'] ?? 1;
$nama_pemesan = $_POST['nama_pemesan'] ?? '';

// LOGIKA FIX: Mencari kiriman dari 'lapangan' atau 'jenis_lapangan'
// Dan pastikan isinya tepat 'Futsal' agar masuk ke ENUM database
$lapangan_input = $_POST['lapangan'] ?? $_POST['jenis_lapangan'] ?? 'Futsal';

if (stripos($lapangan_input, 'Futsal') !== false) {
    $lapangan_final = 'Futsal';
} elseif (stripos($lapangan_input, 'Basket') !== false) {
    $lapangan_final = 'Basket';
} elseif (stripos($lapangan_input, 'Badminton') !== false) {
    $lapangan_final = 'Badminton';
} else {
    $lapangan_final = $lapangan_input;
}

$paket   = $_POST['paket'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$jam     = $_POST['jam'] ?? '';
$durasi  = (int)($_POST['durasi'] ?? 1);
$total   = (int)($_POST['total'] ?? 0);

// Sesuai struktur tabel kamu: jenis_lapangan
$sql = "INSERT INTO bookings (id_user, nama_pemesan, jenis_lapangan, paket, tanggal_booking, jam_booking, durasi, total_harga) 
        VALUES ('$id_user', '$nama_pemesan', '$lapangan_final', '$paket', '$tanggal', '$jam', '$durasi', '$total')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
}
?>