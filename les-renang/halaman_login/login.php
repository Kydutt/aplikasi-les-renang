<?php
session_start();
require_once '../config/auth.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

// Handle login
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $user = verify_user($email, $password);
    
    if ($user['valid']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AquaSwim</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="wave-background">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <div class="login-container">
        <div class="login-box">
            <h2>LOGIN</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if (isset($_GET['registered'])): ?>
                <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
            <?php endif; ?>
            
            <?php if (isset($_GET['logout'])): ?>
                <div class="alert alert-success">Anda berhasil logout. Sampai jumpa!</div>
            <?php endif; ?>
            
            <form action="" method="POST" id="loginForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full">Masuk</button>
            </form>
            
            <div class="form-link">
                Belum punya akun? <a href="register.php">Daftar Sekarang</a>
            </div>
            
            <div class="form-link">
                <a href="../index.php">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>