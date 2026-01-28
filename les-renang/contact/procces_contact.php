<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $program = $_POST['program'];
    $message = trim($_POST['message']);
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Nama tidak boleh kosong';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid';
    }
    
    if (empty($phone)) {
        $errors[] = 'Nomor telepon tidak boleh kosong';
    }
    
    if (empty($program)) {
        $errors[] = 'Program harus dipilih';
    }
    
    if (empty($message)) {
        $errors[] = 'Pesan tidak boleh kosong';
    }
    
    if (empty($errors)) {
        // In real application, save to database or send email
        // For now, just redirect with success message
        
        // Example: Send email (uncomment if mail server is configured)
        /*
        $to = 'info@aquaswim.com';
        $subject = 'Pesan Baru dari Website - ' . $name;
        $body = "Nama: $name\nEmail: $email\nTelepon: $phone\nProgram: $program\n\nPesan:\n$message";
        $headers = "From: $email\r\nReply-To: $email";
        
        mail($to, $subject, $body, $headers);
        */
        
        $_SESSION['contact_success'] = true;
        header('Location: index.php?contact=success#contact');
        exit;
    } else {
        $_SESSION['contact_errors'] = $errors;
        header('Location: index.php#contact');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>