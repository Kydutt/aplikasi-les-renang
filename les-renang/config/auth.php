<?php
/**
 * Authentication Configuration
 * Note: In production, use database with hashed passwords!
 */

// Dummy users for demonstration (REPLACE WITH DATABASE IN PRODUCTION)
$valid_users = [
    [
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@aquaswim.com',
        'password' => 'admin123', // In production: use password_hash()
        'role' => 'admin'
    ],
    [
        'id' => 2,
        'name' => 'John Doe',
        'email' => 'john@aquaswim.com',
        'password' => 'john123',
        'role' => 'user'
    ]
];

/**
 * Verify user credentials
 */
if (!function_exists('verify_user')) {
    function verify_user($email, $password) {
        global $valid_users;
        
        foreach ($valid_users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return [
                    'valid' => true,
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
            }
        }
        
        return ['valid' => false];
    }
}

/**
 * Check if user is logged in
 */
if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }
}

/**
 * Get current user data
 */
if (!function_exists('get_auth_user')) {
    function get_auth_user() {
        if (is_logged_in() && isset($_SESSION['user_name']) && isset($_SESSION['user_email']) && isset($_SESSION['user_role'])) {
            return [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'role' => $_SESSION['user_role']
            ];
        }
        return null;
    }
}

/**
 * Require login - redirect if not logged in
 */
if (!function_exists('require_login')) {
    function require_login() {
        if (!is_logged_in()) {
            header('Location: ../halaman_login/login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
            exit;
        }
    }
}

/**
 * Require admin role
 */
if (!function_exists('require_admin')) {
    function require_admin() {
        require_login();
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: ../index.php');
            exit;
        }
    }
}
?>
