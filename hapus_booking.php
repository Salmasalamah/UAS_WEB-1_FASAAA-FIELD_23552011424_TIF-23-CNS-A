<?php
include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM bookings WHERE id_booking = '$id'");

if($query) {
    header("Location: data_booking.php");
} else {
    echo "Gagal menghapus data";
}
?>