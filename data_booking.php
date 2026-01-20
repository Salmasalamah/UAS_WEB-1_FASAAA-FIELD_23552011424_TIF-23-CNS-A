<?php
session_start();
include "koneksi.php";

// Proteksi halaman: Jika belum login, lempar ke login.php
if (!isset($_SESSION['id_user'])) { 
    header("Location: login.php"); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi | Fasaaa Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        
        /* Navbar Style */
        .navbar-custom { background: #2c3e50; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .card-table { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); background: white; }
        .thead-custom { background-color: #2c3e50; color: white; }
        .btn-action { display: flex; gap: 5px; justify-content: center; }
        
        /* CSS KHUSUS CETAK/PRINT (ANTI KEPOTONG) */
        @media print {
            @page { 
                size: landscape; 
                margin: 0.5cm; 
            }
            .no-print, .navbar, .btn, .btn-action { 
                display: none !important; 
            }
            body { background-color: white !important; padding: 0; }
            .container { width: 100% !important; max-width: 100% !important; padding: 0 !important; margin: 0 !important; }
            .card-table { box-shadow: none !important; border: none !important; width: 100% !important; }
            
            table { 
                width: 100% !important; 
                font-size: 9pt !important; 
                border-collapse: collapse;
                table-layout: fixed; 
            }
            th, td { 
                border: 1px solid #333 !important; 
                padding: 4px !important; 
                word-wrap: break-word; 
            }
            .thead-custom { background-color: #f0f0f0 !important; color: black !important; }
            .badge { border: 1px solid #ccc; color: black !important; background: transparent !important; }
            
            .print-footer { 
                display: block !important; 
                margin-top: 30px; 
                text-align: right; 
                font-size: 10pt;
            }
        }
        .print-footer { display: none; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4 no-print">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fas fa-volleyball-ball me-2"></i>Fasaaa Field</a>
        <div class="d-flex align-items-center">
            <span class="text-light me-3 d-none d-md-block small">Halo, <strong><?php echo $_SESSION['nama']; ?></strong></span>
            <a href="logout.php" class="btn btn-danger btn-sm px-3 rounded-pill" onclick="return confirm('Yakin ingin keluar dari sistem?')">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container py-2">
    <div class="card card-table p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold m-0 text-uppercase">Data Riwayat Reservasi</h4>
                <p class="text-muted m-0 no-print small">Manajemen laporan penyewaan lapangan</p>
            </div>
            <div class="no-print">
                <button onclick="window.print()" class="btn btn-success btn-sm me-2 shadow-sm">
                    <i class="fas fa-print me-1"></i> Cetak Laporan
                </button>
                <a href="futsal.php" class="btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus me-1"></i> Booking Baru
                </a>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="thead-custom text-center">
                    <tr>
                        <th style="width: 40px;">No</th>
                        <th>Nama Pemesan</th>
                        <th style="width: 100px;">Lapangan</th>
                        <th>Paket & Spesifikasi</th>
                        <th style="width: 180px;">Waktu Main</th>
                        <th style="width: 140px;">Total Harga</th>
                        <th class="no-print" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total_pendapatan = 0;
                    $query = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id_booking DESC");
                    $jumlah_data = mysqli_num_rows($query);
                    
                    if($jumlah_data == 0){
                        echo "<tr><td colspan='7' class='text-center py-5 text-muted'>Belum ada data reservasi tersimpan.</td></tr>";
                    }

                    while($row = mysqli_fetch_array($query)) {
                        $total_pendapatan += $row['total_harga'];
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++; ?></td>
                        <td class="fw-bold text-start"><?php echo $row['nama_pemesan']; ?></td>
                        <td><?php echo $row['jenis_lapangan']; ?></td>
                        <td class="text-start">
                            <span class="badge bg-light text-dark border"><?php echo $row['paket']; ?></span>
                        </td>
                        <td style="font-size: 0.8rem;">
                            <i class="far fa-calendar-alt text-primary"></i> <?php echo $row['tanggal_booking']; ?><br>
                            <i class="far fa-clock text-primary"></i> <?php echo $row['jam_booking']; ?> (<?php echo $row['durasi']; ?> Jam)
                        </td>
                        <td class="fw-bold text-end text-success">
                            Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?>
                        </td>
                        <td class="no-print">
                            <div class="btn-action">
                                <a href="edit_booking.php?id=<?php echo $row['id_booking']; ?>" class="btn btn-warning btn-sm text-white shadow-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus_booking.php?id=<?php echo $row['id_booking']; ?>" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="table-light fw-bold">
                    <tr>
                        <td colspan="5" class="text-end small">TOTAL SELURUH RESERVASI:</td>
                        <td class="text-center text-primary"><?php echo $jumlah_data; ?> Tim</td>
                        <td class="no-print"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-end small">TOTAL PENDAPATAN AKHIR:</td>
                        <td class="text-end text-success" style="font-size: 1.1rem;">
                            Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?>
                        </td>
                        <td class="no-print"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="print-footer">
            <p>Dicetak pada: <?php echo date('d/m/Y H:i'); ?></p>
            <br><br>
            <p>Mengetahui,</p>
            <br><br><br>
            <p><strong>( <?php echo $_SESSION['nama']; ?> )</strong><br>Admin Fasaaa Field</p>
        </div>
    </div>
    
    <footer class="text-center mt-4 text-muted small no-print">
        <p>&copy; 2026 - UAS Pemrograman Web 1<br>
        <strong>23552011424_SALMA SALAMAH_TIF 23 RP CNS A</strong></p>
    </footer>
</div>

</body>
</html>