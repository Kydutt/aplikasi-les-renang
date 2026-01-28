<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'aquaswim_db');

// Application Configuration
define('APP_NAME', 'AquaSwim');
define('APP_URL', 'http://localhost/aquaswim');
define('APP_EMAIL', 'info@aquaswim.com');

// Timezone
date_default_timezone_set('Asia/Jakarta');

// Database Connection Function
function getDBConnection() {
    try {
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $conn;
    } catch(PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Helper Functions
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        redirect('halaman_login/login.php');
    }
}

function format_currency($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function format_date($date) {
    return date('d F Y', strtotime($date));
}
?>