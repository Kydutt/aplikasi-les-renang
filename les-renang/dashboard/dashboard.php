<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_role = $_SESSION['user_role'];

// Dummy data - replace with database queries
$total_students = 128;
$active_classes = 12;
$total_revenue = 'Rp 45.6 Juta';
$completion_rate = '87%';

// Sample student data
$students = [
    ['id' => 1, 'name' => 'Ahmad Rizki', 'program' => 'Pemula', 'status' => 'Aktif', 'progress' => '60%'],
    ['id' => 2, 'name' => 'Siti Nurhaliza', 'program' => 'Menengah', 'status' => 'Aktif', 'progress' => '75%'],
    ['id' => 3, 'name' => 'Budi Santoso', 'program' => 'Profesional', 'status' => 'Selesai', 'progress' => '100%'],
    ['id' => 4, 'name' => 'Dewi Lestari', 'program' => 'Pemula', 'status' => 'Aktif', 'progress' => '40%'],
    ['id' => 5, 'name' => 'Eko Prasetyo', 'program' => 'Menengah', 'status' => 'Pending', 'progress' => '0%'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AquaSwim</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wave-background">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <header class="dashboard-header">
        <div class="logo">AQUASWIM DASHBOARD</div>
        <nav class="dashboard-nav">
            <span>Halo, <?php echo htmlspecialchars($user_name); ?>!</span>
            <a href="dashboard.php">Dashboard</a>
            <a href="students.php">Data Siswa</a>
            <a href="schedule.php">Jadwal</a>
            <a href="logout.php" style="color: var(--accent);">Logout</a>
        </nav>
    </header>

    <div class="dashboard-content">
        <h2 class="section-title">Dashboard Overview</h2>
        
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Total Siswa</h3>
                <p><?php echo $total_students; ?></p>
            </div>
            <div class="dashboard-card">
                <h3>Kelas Aktif</h3>
                <p><?php echo $active_classes; ?></p>
            </div>
            <div class="dashboard-card">
                <h3>Pendapatan Bulan Ini</h3>
                <p><?php echo $total_revenue; ?></p>
            </div>
            <div class="dashboard-card">
                <h3>Tingkat Penyelesaian</h3>
                <p><?php echo $completion_rate; ?></p>
            </div>
        </div>

        <h3 style="margin: 3rem 0 1.5rem; font-size: 2rem; color: var(--dark);">Data Siswa Terbaru</h3>
        
        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td><?php echo htmlspecialchars($student['program']); ?></td>
                        <td>
                            <?php
                            $badge_class = 'badge-active';
                            if ($student['status'] === 'Pending') $badge_class = 'badge-pending';
                            if ($student['status'] === 'Selesai') $badge_class = 'badge-completed';
                            ?>
                            <span class="badge <?php echo $badge_class; ?>"><?php echo $student['status']; ?></span>
                        </td>
                        <td><?php echo $student['progress']; ?></td>
                        <td>
                            <a href="student_detail.php?id=<?php echo $student['id']; ?>" style="color: var(--primary); text-decoration: none; font-weight: 600;">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem; text-align: center;">
            <a href="students.php" class="btn btn-primary">Lihat Semua Siswa</a>
        </div>
    </div>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2026 AquaSwim Dashboard. All rights reserved.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>