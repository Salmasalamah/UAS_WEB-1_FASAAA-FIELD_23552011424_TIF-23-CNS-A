<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

// Cek user di database
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user' AND password = '$pass'");

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Username atau Password Salah!']);
}
?>