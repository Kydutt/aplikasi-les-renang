<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $program = isset($_POST['program']) ? $_POST['program'] : '';
    
    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $error = 'Semua field harus diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid!';
    } elseif (strlen($password) < 6) {
        $error = 'Password minimal 6 karakter!';
    } elseif ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak sama!';
    } else {
        // In real application, save to database
        // For now, just redirect to login
        header('Location: login.php?registered=1');
        exit;
    }
}

// Get program from URL if exists
$selected_program = isset($_GET['program']) ? $_GET['program'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - AquaSwim</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="wave-background">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <div class="register-container">
        <div class="register-box">
            <h2>DAFTAR</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form action="" method="POST" id="registerForm">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="program">Program yang Diminati</label>
                    <select id="program" name="program" required>
                        <option value="">Pilih Program</option>
                        <option value="pemula" <?php echo $selected_program === 'pemula' ? 'selected' : ''; ?>>Paket Pemula - Rp 500.000</option>
                        <option value="menengah" <?php echo $selected_program === 'menengah' ? 'selected' : ''; ?>>Paket Menengah - Rp 750.000</option>
                        <option value="profesional" <?php echo $selected_program === 'profesional' ? 'selected' : ''; ?>>Paket Profesional - Rp 1.200.000</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <small style="color: #666;">Minimal 6 karakter</small>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full">Daftar Sekarang</button>
            </form>
            
            <div class="form-link">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </div>
            
            <div class="form-link">
                <a href="../index.php">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>