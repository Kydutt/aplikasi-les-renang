<?php
session_start();
require_once '../config/auth.php';

// Require login
require_login();

// Get user data with fallback
$user = get_auth_user();
if (!$user || !is_array($user)) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AquaSwim</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="logo">AQUASWIM</div>
        <div class="dashboard-nav">
            <span>Selamat datang, <?php echo htmlspecialchars($user['name']); ?>!</span>
            <a href="../halaman_login/logout.php">Logout</a>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <h1 style="color: #03045E; margin-bottom: 2rem;">Dashboard</h1>
        
        <!-- Stats Cards -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Program Aktif</h3>
                <p>3</p>
            </div>
            <div class="dashboard-card">
                <h3>Total Jam Latihan</h3>
                <p>24</p>
            </div>
            <div class="dashboard-card">
                <h3>Tingkat Kemajuan</h3>
                <p>75%</p>
            </div>
        </div>

        <!-- Data Table -->
        <div class="data-table">
            <h2 style="color: #03045E; margin-bottom: 1.5rem; margin-top: 2rem;">Riwayat Program</h2>
            <table>
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Jam Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paket Pemula</td>
                        <td>2026-01-15</td>
                        <td><span class="badge badge-completed">Selesai</span></td>
                        <td>8/8</td>
                    </tr>
                    <tr>
                        <td>Paket Menengah</td>
                        <td>2026-01-20</td>
                        <td><span class="badge badge-active">Aktif</span></td>
                        <td>6/12</td>
                    </tr>
                    <tr>
                        <td>Paket Profesional</td>
                        <td>2026-01-25</td>
                        <td><span class="badge badge-pending">Pending</span></td>
                        <td>0/16</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- User Info -->
        <div class="data-table" style="margin-top: 3rem;">
            <h2 style="color: #03045E; margin-bottom: 1.5rem;">Informasi Akun</h2>
            <div style="padding: 2rem;">
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Role:</strong> <?php echo htmlspecialchars(ucfirst($user['role'])); ?></p>
                <p><strong>Member Sejak:</strong> 2026-01-10</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="margin-top: 3rem;">
        <div class="footer-bottom">
            <p>&copy; 2026 AquaSwim. All rights reserved.</p>
        </div>
    </footer>

    <script src="../assets/js/script.js"></script>
</body>
</html>
