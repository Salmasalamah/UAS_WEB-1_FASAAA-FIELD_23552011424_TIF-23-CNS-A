<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun | Fasaaa Field</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-container">

<div class="card p-4 shadow-lg" style="width: 100%; max-width: 450px; border-radius: 15px;">
    <div class="text-center mb-4">
        <h3 class="text-denim fw-bold">Join Fasaaa Field</h3>
        <p class="text-muted">Daftar untuk mulai booking lapangan</p>
    </div>

    <form action="modules/auth/proses_register.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Fasa Gantenk" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="username123" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="******" required>
        </div>
        <button type="submit" class="btn btn-denim w-100 py-2">Daftar Akun</button>
    </form>
    
    <div class="text-center mt-3">
        <small>Sudah punya akun? <a href="login.php" class="text-denim">Login di sini</a></small>
    </div>
</div>

</body>
</html>